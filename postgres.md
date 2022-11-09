# Como correr cenas no Postgress no terminal dentro do container

Se repararem no yml agora temos:
```yaml
volumes: 
  - ./pgsql:/scripts
``` 

As alteracoes na pasta pgsql do vosso pc são refletidas no container do pgsql o que permite depois fazer :

```sh
$ sudo docker exec -it lbaw2215-postgres-1 /bin/bash
$ cd scripts
$ pgslq -U postgres -d local
```

Dentro do modo interativo do pgsql correr
- `\i file_que_querem_correr.sql`
- `\q` se quiserem sair.


Depois as changes que fizerem serão refletidas no pgadmin  que está criado com o docker compose

## Como conectar à Base de Dados Remota


Depois de estarem dentro do container devem correr:

- `psql -h db.fe.up.pt -p 5432 -U lbaw2215 lbaw2215`
 
E depois já estam dentro da base de dados remota!
