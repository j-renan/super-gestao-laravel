import psycopg2
from faker import Faker

# Conecta no banco de dados
con = psycopg2.connect(
    host='database',
    database='sg',
    user='postgres',
    password='1234'
)

cur = con.cursor()

# Carrega a lib Faker em pt-br
fake = Faker(locale='pt-br')

base_sql = "INSERT INTO produtos (nome, descricao, peso, unidade_id, created_at, updated_at) VALUES ('{}', '{}', '{}', '{}', '{}', '{}')"

# cria n registros fakes no banco de dados
for i in range(100):
    nome = fake.first_name_male()
    created_at = fake.date_time()
    updated_at = fake.date_time()
    descricao = fake.catch_phrase()
    peso = fake.building_number()
    unidade_id = fake.random_int(min=1, max=2)
    sql = base_sql.format(nome, descricao, peso, unidade_id, created_at, updated_at)
    cur.execute(sql)

# base_sql = "INSERT INTO fornecedores (nome, created_at, updated_at, uf, email, site) VALUES ('{}', '{}', '{}', 'SP', '{}', '{}')"

# # cria n registros fakes no banco de dados
# for i in range(100):
#     nome = fake.name()
#     created_at = fake.date_time()
#     updated_at = fake.date_time()
#     email = fake.email()
#     site = fake.domain_name()
#     sql = base_sql.format(nome, created_at, updated_at, email, site)
#     cur.execute(sql)

print('---------------------GRAVOU-----------------------')

# Faz commit no banco e fecha a conexao
con.commit()
con.close()
