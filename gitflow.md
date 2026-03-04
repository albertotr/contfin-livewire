# Guia de Comandos do GitFlow

Este documento contém os principais comandos do GitFlow organizados por tipo de branch e funcionalidade.

## Sumário

- [Inicialização](#inicializacao)
- [Inicia nova funcionalidade](#inicia-nova-funcionalidade)
- [Release Branches](#release-branches-preparação-de-versões)
- [Hotfix Branches](#hotfix-branches-correções-urgentes)
- [Support Branches](#support-branches-suporte-a-versões-antigas)
- [Comandos Úteis](#comandos-úteis-para-visualização)
- [Fluxo Visual](#resumo-visual-do-fluxo)
- [Dicas Importantes](#dica-importante)

---

## Inicialização

### Iniciar o GitFlow no repositório

```bash
git flow init
```

## Inicia nova funcionalidade

```bash
git flow feature start nome
```

## Finaliza funcionalidade

```bash
git flow feature finish nome
```

## Prepara versão 1.0.0

```bash
git flow release start 1.0.0
```

## Lança versão 1.0.0

```bash
git flow release finish 1.0.0
```

## Corrige bug em produção

```bash
git flow hotfix start 1.0.1
```

## Finaliza correção

```bash
git flow hotfix finish 1.0.1
```
