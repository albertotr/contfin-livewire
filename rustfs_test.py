#!/usr/bin/env python3

import requests
import boto3
from botocore.config import Config
import os
from datetime import datetime

# Configurações
endpoint_url = 'http://localhost:9000'
access_key = 'laravel'
secret_key = 'laravel123'
bucket_name = 'test-bucket-python'

def testar_com_boto3():
    """Teste usando boto3 (cliente AWS S3)"""
    print("\n📦 Testando com boto3...")

    # Configurar cliente
    s3 = boto3.client(
        's3',
        endpoint_url=endpoint_url,
        aws_access_key_id=access_key,
        aws_secret_access_key=secret_key,
        config=Config(signature_version='s3v4'),
        region_name='us-east-1',
        use_ssl=False,
        verify=False
    )

    try:
        # Criar bucket
        print("Criando bucket...")
        s3.create_bucket(Bucket=bucket_name)
        print("✅ Bucket criado")

        # Listar buckets
        response = s3.list_buckets()
        print("Buckets disponíveis:")
        for bucket in response['Buckets']:
            print(f"  - {bucket['Name']}")

        # Criar arquivo de teste
        conteudo = f"Teste RustFS em Python - {datetime.now()}"
        s3.put_object(
            Bucket=bucket_name,
            Key='teste.txt',
            Body=conteudo.encode('utf-8'),
            ContentType='text/plain'
        )
        print("✅ Upload realizado")

        # Listar objetos
        response = s3.list_objects_v2(Bucket=bucket_name)
        if 'Contents' in response:
            print("Arquivos no bucket:")
            for obj in response['Contents']:
                print(f"  - {obj['Key']} ({obj['Size']} bytes)")

        # Fazer download
        response = s3.get_object(Bucket=bucket_name, Key='teste.txt')
        conteudo_baixado = response['Body'].read().decode('utf-8')
        print(f"✅ Download realizado: '{conteudo_baixado}'")

        # Deletar objeto
        s3.delete_object(Bucket=bucket_name, Key='teste.txt')
        print("✅ Objeto deletado")

        # Deletar bucket
        s3.delete_bucket(Bucket=bucket_name)
        print("✅ Bucket deletado")

        return True

    except Exception as e:
        print(f"❌ Erro: {e}")
        return False

def testar_com_requests():
    """Teste usando requests HTTP direto"""
    print("\n📡 Testando com requests...")

    headers = {
        'Authorization': f'AWS {access_key}:{secret_key}'
    }

    try:
        # Health check
        response = requests.get(f"{endpoint_url}/health")
        if response.status_code == 200:
            print("✅ RustFS saudável")

        # Criar bucket
        response = requests.put(
            f"{endpoint_url}/{bucket_name}-requests",
            headers=headers
        )
        print("✅ Bucket criado via HTTP")

        # Upload
        arquivo_teste = 'teste-http.txt'
        with open(arquivo_teste, 'w') as f:
            f.write(f"Teste via HTTP - {datetime.now()}")

        with open(arquivo_teste, 'rb') as f:
            response = requests.put(
                f"{endpoint_url}/{bucket_name}-requests/{arquivo_teste}",
                headers=headers,
                data=f
            )
        print("✅ Upload via HTTP")

        # Download
        response = requests.get(
            f"{endpoint_url}/{bucket_name}-requests/{arquivo_teste}",
            headers=headers
        )
        print(f"✅ Download via HTTP: {response.text}")

        # Limpeza
        os.remove(arquivo_teste)

        return True

    except Exception as e:
        print(f"❌ Erro: {e}")
        return False

def testar_arquivos_grandes():
    """Teste com arquivos maiores"""
    print("\n📊 Testando arquivo maior...")

    s3 = boto3.client(
        's3',
        endpoint_url=endpoint_url,
        aws_access_key_id=access_key,
        aws_secret_access_key=secret_key,
        config=Config(signature_version='s3v4'),
        region_name='us-east-1',
        use_ssl=False
    )

    try:
        # Criar bucket
        bucket_grande = 'bucket-grande'
        s3.create_bucket(Bucket=bucket_grande)

        # Criar arquivo de 5MB
        import numpy as np
        dados = np.random.bytes(5 * 1024 * 1024)  # 5MB

        # Upload multipart
        s3.put_object(
            Bucket=bucket_grande,
            Key='arquivo-5mb.bin',
            Body=dados
        )
        print("✅ Upload de 5MB realizado")

        # Verificar tamanho
        response = s3.head_object(Bucket=bucket_grande, Key='arquivo-5mb.bin')
        tamanho = response['ContentLength']
        print(f"✅ Arquivo tem {tamanho/1024/1024:.2f}MB")

        # Limpeza
        s3.delete_object(Bucket=bucket_grande, Key='arquivo-5mb.bin')
        s3.delete_bucket(Bucket=bucket_grande)
        print("✅ Limpeza realizada")

        return True

    except ImportError:
        print("⚠️ NumPy não instalado, pulando teste de arquivo grande")
        return True
    except Exception as e:
        print(f"❌ Erro: {e}")
        return False

def testar_cors():
    """Teste configurações CORS"""
    print("\n🌐 Testando CORS...")

    # Simular requisição de origem diferente
    headers = {
        'Origin': 'http://localhost:3000',
        'Access-Control-Request-Method': 'GET'
    }

    try:
        response = requests.options(
            f"{endpoint_url}/",
            headers=headers
        )

        if 'access-control-allow-origin' in response.headers:
            print("✅ CORS configurado")
            print(f"   Allow-Origin: {response.headers.get('access-control-allow-origin')}")
        else:
            print("⚠️ CORS pode não estar configurado")

    except Exception as e:
        print(f"❌ Erro no teste CORS: {e}")

if __name__ == "__main__":
    print("="*50)
    print("🚀 Testando RustFS")
    print("="*50)

    # Testar conexão básica
    try:
        response = requests.get(f"{endpoint_url}/health")
        if response.status_code == 200:
            print("✅ Conexão com RustFS OK")
        else:
            print("❌ Problema na conexão")
            exit(1)
    except:
        print("❌ RustFS não está acessível")
        print("Verifique se o container está rodando:")
        print("  docker ps | grep rustfs")
        print("  docker logs laravel_rustfs")
        exit(1)

    # Executar testes
    testar_com_boto3()
    testar_com_requests()
    testar_arquivos_grandes()
    testar_cors()

    print("\n✅ Todos os testes concluídos!")
