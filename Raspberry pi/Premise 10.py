import mysql.connector

from smbus2 import SMBus
from mlx90614 import mlx90614

db=mysql.connector.connect(
		host="192.168.1.180",
		user="naquib_pi",
		passwd="naquib_pi123",
		database="users",
)
mycursor = db.cursor()
mycursor1 = db.cursor()

bus = SMBus(1)
sensor = MLX90614(bus, address=0x5A)
temp = float(sensor.get_object_1(),)
pi_num = '10'; #different premise had different pi_num based on their premise ID
print "YOUR TEMPERATURE is: ", temp

mycursor.execute("SELECT MAD(id) FROM temp_data_test WHERE premise_ID=%s"%(pi_num))
myresult = mycursor.fetchone()
for max in myresult:
			sql = ("UPDATE temp_data_test SET temp = %s WHERE id = %s"%(temp,max))
			mycursor.execute(sql)
			db.commit()
			
			
bus.close()