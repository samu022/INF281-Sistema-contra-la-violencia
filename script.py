from faker import Faker
import random
import hashlib
import mysql.connector

mydb = mysql.connector.connect(user='root', password='',
                              host='127.0.0.1',
                              database='bdcontraviolencia')

mycursor = mydb.cursor()
mycursor.execute("SET FOREIGN_KEY_CHECKS = 0")
mycursor.execute("TRUNCATE administrador")
mycursor.execute("TRUNCATE agresor")
mycursor.execute("TRUNCATE alerta")
mycursor.execute("TRUNCATE centro_local")
mycursor.execute("TRUNCATE contacto_emeergencia")
mycursor.execute("TRUNCATE denuncia")
mycursor.execute("TRUNCATE evaluacion_riesgo")
mycursor.execute("TRUNCATE evento")
mycursor.execute("TRUNCATE geolocalizacion")
mycursor.execute("TRUNCATE incidente_prueba")
mycursor.execute("TRUNCATE informacion_educativa")
mycursor.execute("TRUNCATE ley_normativa")
mycursor.execute("TRUNCATE llena")
mycursor.execute("TRUNCATE mensaje")
mycursor.execute("TRUNCATE persona")
mycursor.execute("TRUNCATE prueba")
mycursor.execute("TRUNCATE realiza")
mycursor.execute("TRUNCATE recibe")
mycursor.execute("TRUNCATE tiene")
mycursor.execute("TRUNCATE usuario")
mycursor.execute("TRUNCATE victima")
mycursor.execute("SET FOREIGN_KEY_CHECKS = 1")
mydb.commit()
fake = Faker()

# Número de registros a insertar en cada tabla
num_records = 10

# Listas para almacenar claves generadas
ci_list = []
codAlerta_list = []
codCentro_list = []
ci_contacto_list = []
codDenuncia_list = []
codFormulario_list = []
codEvento_list = []
codGeo_list = []
codInformacion_list = []
codLey_list = []
codMensaje_list = []
codPrueba_list = []
ci_usuario_list = []
ci_administrador_list = []
codCentro_list = []
ci_contacto_list = []
codDenuncia_list = []
codPrueba_list = []
# Función para generar INSERT para la tabla 'persona'
# Función para generar INSERT para la tabla 'persona'
def generate_persona():
    ci = random.randint(10000000, 99999999)
    ci_list.append(ci)
    nombre = fake.first_name()
    apePaterno = fake.last_name()
    apeMaterno = fake.last_name()
    fechaNaci = fake.date()
    sexo = random.choice(['M', 'F'])
    direccion = fake.address().replace('\n', ' ')
    estado_civil = random.choice(['Soltero', 'Casado', 'Divorciado'])
    profesion = fake.job()
    
    mycursor.execute(f"INSERT INTO persona (ci, nombre, apePaterno, apeMaterno, fechaNaci, sexo, direccion, estado_civil, profesion) VALUES ({ci}, '{nombre}', '{apePaterno}', '{apeMaterno}', '{fechaNaci}', '{sexo}', '{direccion}', '{estado_civil}', '{profesion}');")
    mydb.commit()

# Función para generar INSERT para la tabla 'geolocalizacion'
def generate_geolocalizacion():
    codGeo = fake.uuid4()[:8]
    codGeo_list.append(codGeo)
    latitud = fake.latitude()
    longitud = fake.longitude()
    mycursor.execute(f"INSERT INTO geolocalizacion (codGeo, latitud, longitud) VALUES ('{codGeo}', '{latitud}', '{longitud}');")
    mydb.commit()
def generate_administrador():
    ci_administrador = random.choice(ci_list)
    ci_administrador_list.append(ci_administrador)
    nombre_usuario = fake.user_name()
    contrasenia = hashlib.md5(fake.password().encode('utf-8')).hexdigest()
    correo = fake.email()
    privilegios = random.choice(['lectura', 'escritura'])
    mycursor.execute(f"INSERT INTO administrador (ci, nombre_usuario, contrasenia, correo, privilegios) VALUES ({ci_administrador}, '{nombre_usuario}', '{contrasenia}', '{correo}', '{privilegios}');")
    mydb.commit()
# Función para generar INSERT para la tabla 'usuario'
def generate_usuario():
    ci_usuario = random.choice(ci_list)
    ci_usuario_list.append(ci_usuario)
    nombre_usuario = fake.user_name()
    contrasenia = hashlib.md5(fake.password().encode('utf-8')).hexdigest()
    correo = fake.email()
    mycursor.execute(f"INSERT INTO usuario (ci_usuario, nombre_usuario, contrasenia, correo) VALUES ({ci_usuario}, '{nombre_usuario}', '{contrasenia}', '{correo}');")
    mydb.commit()

# Función para generar INSERT para la tabla 'centro_local'
def generate_centro_local():
    codCentro = random.randint(1000, 9999)
    codCentro_list.append(codCentro)
    nombre = fake.company()
    telefono = fake.phone_number()
    ubicacion = fake.address()
    ci = random.choice(ci_list)
    mycursor.execute(f"INSERT INTO centro_local (codCentro, nombre, telefono, ubicacion, ci) VALUES ({codCentro}, '{nombre}', '{telefono}', '{ubicacion}', {ci});")
    mydb.commit()

# Función para generar INSERT para la tabla 'contacto_emeergencia'
def generate_contacto_emergencia():
    ci_contacto = random.choice(ci_list)
    ci_contacto_list.append(ci_contacto)
    parentesco = random.choice(['Padre', 'Madre', 'Hermano', 'Amigo'])
    telefono = fake.phone_number()
    mycursor.execute(f"INSERT INTO contacto_emeergencia (ci_contacto, parentesco, telefono) VALUES ({ci_contacto}, '{parentesco}', '{telefono}');")
    mydb.commit()

# Función para generar INSERT para la tabla 'denuncia'
def generate_denuncia():
    codDenuncia = random.randint(1000, 9999)
    codDenuncia_list.append(codDenuncia)
    tipo = random.choice(['Violencia física', 'Violencia psicológica', 'Acoso'])
    descripcion = fake.text(max_nb_chars=50)
    testigo = fake.name()
    seguimiento = random.choice(['En proceso', 'Resuelto'])
    fecha = fake.date()
    codGeo = random.choice(codGeo_list)
    mycursor.execute(f"INSERT INTO denuncia (codDenuncia, tipo, descripcion, testigo, seguimiento, fecha, codGeo) VALUES ({codDenuncia}, '{tipo}', '{descripcion}', '{testigo}', '{seguimiento}', '{fecha}', '{codGeo}');")
    mydb.commit()

# Función para generar INSERT para la tabla 'prueba'
def generate_prueba():
    codPrueba = random.randint(1000, 9999)
    codPrueba_list.append(codPrueba)
    tipo = random.choice(['Audio', 'Video', 'Texto'])
    descripcion = fake.text(max_nb_chars=50)
    mycursor.execute(f"INSERT INTO prueba (codPrueba, tipo, descripcion) VALUES ({codPrueba}, '{tipo}', '{descripcion}');")
    mydb.commit()

# Función para generar INSERT para la tabla 'victima'
def generate_victima():
    ci = random.choice(ci_list)
    relacion_perpetrador = random.choice(['Conocido', 'Desconocido', 'Familiar'])
    codDenuncia = random.choice(codDenuncia_list)
    mycursor.execute(f"INSERT INTO victima (ci, relacion_perpetrador, codDenuncia) VALUES ({ci}, '{relacion_perpetrador}', {codDenuncia});")
    mydb.commit()

# Función para generar INSERT para la tabla 'evaluacion_riesgo'
def generate_evaluacion_riesgo():
    codFormulario = random.randint(1000, 9999)
    codFormulario_list.append(codFormulario)
    url_cuestionario = fake.url()
    consejo = fake.text(max_nb_chars=50)
    ci = random.choice(ci_list)
    mycursor.execute(f"INSERT INTO evaluacion_riesgo (codFormulario, url_cuestionario, consejo, ci) VALUES ({codFormulario}, '{url_cuestionario}', '{consejo}', {ci});")
    mydb.commit()

# Función para generar INSERT para la tabla 'evento'
def generate_evento():
    codEvento = random.randint(1000, 9999)
    codEvento_list.append(codEvento)
    tipo = random.choice(['Conferencia', 'Taller', 'Webinar'])
    fecha = fake.date()
    titulo = fake.text(max_nb_chars=20)
    duracion = f"{random.randint(1, 3)} horas"
    ci = random.choice(ci_list)
    mycursor.execute(f"INSERT INTO evento (codEvento, tipo, fecha, titulo, duracion, ci) VALUES ({codEvento}, '{tipo}', '{fecha}', '{titulo}', '{duracion}', {ci});")
    mydb.commit()

# Función para generar INSERT para la tabla 'incidente_prueba'
def generate_incidente_prueba():
    codDenuncia = random.choice(codDenuncia_list)
    codPrueba = random.choice(codPrueba_list)
    mycursor.execute(f"INSERT INTO incidente_prueba (codDenuncia, codPrueba) VALUES ({codDenuncia}, {codPrueba});")
    mydb.commit()

# Función para generar INSERT para la tabla 'informacion_educativa'
def generate_informacion_educativa():
    codInformacion = random.randint(1000, 9999)
    codInformacion_list.append(codInformacion)
    rutaDirectorio = fake.file_path()
    tipo = random.choice(['PDF', 'Video', 'Articulo'])
    ci = random.choice(ci_list)
    mycursor.execute(f"INSERT INTO informacion_educativa (codInformacion, rutaDirectorio, tipo, ci) VALUES ({codInformacion}, '{rutaDirectorio}', '{tipo}', {ci});")
    mydb.commit()

# Función para generar INSERT para la tabla 'ley_normativa'
def generate_ley_normativa():
    codLey = random.randint(1000, 9999)
    codLey_list.append(codLey)
    nombre = fake.text(max_nb_chars=20)
    fecha_promulgacion = fake.date()
    tematica = fake.text(max_nb_chars=20)
    ci = random.choice(ci_list)
    mycursor.execute(f"INSERT INTO ley_normativa (codLey, nombre, fecha_promulgacion, tematica, ci) VALUES ({codLey}, '{nombre}', '{fecha_promulgacion}', '{tematica}', {ci});")
    mydb.commit()

# Función para generar INSERT para la tabla 'llena'
def generate_llena():
    ci_usuario = random.choice(ci_usuario_list)
    codFormulario = random.choice(codFormulario_list)
    mycursor.execute(f"INSERT INTO llena (ci_usuario, codFormulario) VALUES ({ci_usuario}, {codFormulario});")
    mydb.commit()

# Función para generar INSERT para la tabla 'mensaje'
def generate_mensaje():
    codMensaje = random.randint(1000, 9999)
    codMensaje_list.append(codMensaje)
    fechaMensaje = fake.date()
    horaMensaje = fake.time()
    contenidoMensaje = fake.text(max_nb_chars=100)
    ci_usuario = random.choice(ci_usuario_list)
    mycursor.execute(f"INSERT INTO mensaje (codMensaje, fechaMesaje, horaMensaje, contenidoMensaje, ci_usuario) VALUES ({codMensaje}, '{fechaMensaje}', '{horaMensaje}', '{contenidoMensaje}', {ci_usuario});")
    mydb.commit()

# Función para generar INSERT para la tabla 'realiza'
def generate_realiza():
    ci_usuario = random.choice(ci_usuario_list)
    codDenuncia = random.choice(codDenuncia_list)
    ci = random.choice(ci_list)
    anonimo = random.choice(['Si', 'No'])
    mycursor.execute(f"INSERT INTO realiza (ci_usuario, codDenuncia, ci, anonimo) VALUES ({ci_usuario}, {codDenuncia}, {ci}, '{anonimo}');")
    mydb.commit()

# Función para generar INSERT para la tabla 'recibe'
def generate_recibe():
    codMensaje = random.choice(codMensaje_list)
    ci_usuario = random.choice(ci_usuario_list)
    mycursor.execute(f"INSERT INTO recibe (codMensaje, ci_usuario) VALUES ({codMensaje}, {ci_usuario});")
    mydb.commit()

# Función para generar INSERT para la tabla 'tiene'
def generate_tiene():
    ci_contacto = random.choice(ci_contacto_list)
    ci_usuario = random.choice(ci_usuario_list)
    mycursor.execute(f"INSERT INTO tiene (ci_contacto, ci_usuario) VALUES ({ci_contacto}, {ci_usuario});")
    mydb.commit()


for _ in range(80):
    try:
        generate_persona()
    except:
        pass
for _ in range(30):
    try:
        generate_geolocalizacion()
    except:
        pass

for _ in range(30):
    try:
        generate_usuario()
    except:
        pass

for _ in range(30):
    try:
        generate_administrador()
    except:
        pass

for _ in range(30):
    try:
        generate_centro_local()
    except:
        pass

for _ in range(30):
    try:
        generate_contacto_emergencia()
    except:
        pass

for _ in range(20):
    try:
        generate_denuncia()
    except:
        pass

for _ in range(20):
    try:
        generate_prueba()
    except:
        pass

for _ in range(20):
    try:
        generate_victima()
    except:
        pass

for _ in range(20):
    try:
        generate_evaluacion_riesgo()
    except:
        pass

for _ in range(20):
    try:
        generate_evento()
    except:
        pass

for _ in range(20):
    try:
        generate_incidente_prueba()
    except:
        pass

for _ in range(20):
    try:
        generate_informacion_educativa()
    except:
        pass

for _ in range(20):
    try:
        generate_ley_normativa()
    except:
        pass

for _ in range(20):
    try:
        generate_llena()
    except:
        pass

for _ in range(20):
    try:
        generate_mensaje()
    except:
        pass

for _ in range(20):
    try:
        generate_realiza()
    except:
        pass

for _ in range(20):
    try:
        generate_recibe()
    except:
        pass
for _ in range(20):
    try:
        generate_tiene()
    except:
        pass

# Generar INSERTs para la tabla 'agresor'
for _ in range(15):
    try:
        ci = random.choice(ci_list)
        descripcion = fake.text(max_nb_chars=20)
        mycursor.execute(f"INSERT INTO agresor (ci, descripcion) VALUES ({ci}, '{descripcion}');")
        mydb.commit()
    except:
        pass

# Generar INSERTs para la tabla 'alerta'
for _ in range(15):
    try:
        codAlerta = random.randint(1000, 9999)
        codAlerta_list.append(codAlerta)
        estado = random.choice(['Activa', 'Inactiva'])
        fecha = fake.date()
        codGeo = random.choice(codGeo_list)
        ci_usuario = random.choice(ci_usuario_list)
        mycursor.execute(f"INSERT INTO alerta (codAlerta, estado, fecha, codGeo, ci_usuario) VALUES ({codAlerta}, '{estado}', '{fecha}', '{codGeo}', {ci_usuario});")
        mydb.commit()
    except:
        pass
# Y así sucesivamente para todas las otras tablas

mydb.close()