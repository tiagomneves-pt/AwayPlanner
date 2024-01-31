# **Away Planner**
## Entrega Época de Recurso 23/24


## Modificações no projecto <sub>relativamente à entrega da EN </sub>
### Novas funcionalidades
1. Página "Contactos"
    - [contactos.php](contactos.php)
    - Acessível pela navbar e pela página inicial do cliente
2. Página "Análises"

### Aprimoramento de funções
1. Atributo "visibilidade"
    - As tabelas "viagens" e "passageiros" passaram a ter o atributo "visibilidade"
    - Permite que os registos sejam ocultados ao invés de serem apagados
    - As opções de administrador agora dão `UPDATE` à tabela em vez de `DELETE` 

### Correcção de _bugs_ 
1. [index.php](index.php)
    - Botão "Próxima viagem" funcional

### Formatação/UI
1. Navbar
    - Páginas do lado do logo realinhadas à direita
2. [Tabela "Viagens planeadas"](viagens.php)
    - As viagens vêm a sua cor de fundo alterada consoante o estado da viagem
    - Botões de gestão da viagem alterados para melhorar a sua visibilidade 

### Outros
1. Dados adicionados ao [query](ap.sql)
