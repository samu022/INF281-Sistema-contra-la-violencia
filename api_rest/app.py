from flask import Flask, request, jsonify
import mysql.connector
from mysql.connector import Error
from datetime import datetime

app = Flask(__name__)

# Configura la conexión a la base de datos MySQL
def create_db_connection():
    connection = None
    try:
        connection = mysql.connector.connect(
            host='127.0.0.1',
            database='bdcontraviolencia',
            user='root',
            password=''
        )
        return connection
    except Error as e:
        print(e)
    return connection

@app.route('/geolocalizacion', methods=['POST'])
def insert_geolocalizacion():
    if request.method == 'POST':
        latitud = request.json['latitud']
        longitud = request.json['longitud']
        try:
            connection = create_db_connection()
            cursor = connection.cursor()

            # Inserta en la tabla 'geolocalizacion'
            insert_query = "INSERT INTO geolocalizacion (latitud, longitud) VALUES (%s, %s)"
            cursor.execute(insert_query, (latitud, longitud))

            connection.commit()
            cursor.close()
            connection.close()

            
        except Error as e:
            return jsonify({"error": str(e)})

        tipo = "alerta"
        descripcion = "alerta"
        testigo = None
        seguimiento = "En proceso"
        fecha = datetime.now().strftime("%Y-%m-%d")
        
        try:
            connection = create_db_connection()
            cursor = connection.cursor()

            # Obtén el último 'codGeo' de la tabla 'geolocalizacion'
            cursor.execute("SELECT MAX(codGeo) FROM geolocalizacion")
            codGeo = cursor.fetchone()[0]

            # Inserta en la tabla 'denuncia' utilizando el 'codGeo' obtenido
            insert_query = "INSERT INTO denuncia (tipo, descripcion, testigo, seguimiento, fecha, codGeo) VALUES (%s, %s, %s, %s, %s, %s)"
            cursor.execute(insert_query, (tipo, descripcion, testigo, seguimiento, fecha, codGeo))

            connection.commit()
            cursor.close()
            connection.close()

            return jsonify({"message": "Exito"})
        except Error as e:
            return jsonify({"error": str(e)})
            
if __name__ == '__main__':
    app.run(host="0.0.0.0", debug=True)
