import sys
import json
import pickle

# melakukan pengecekan apakah argumen script exec dijalankan
if len(sys.argv) < 2: 
    print("Error: No command-line argument provided.")
    sys.exit(1)

try:
    # jika berhasil maka akan mengambil data yang ada di exec
    input_data = json.loads(sys.argv[1])
except json.JSONDecodeError:
    print("Error: Invalid JSON data provided.")
    sys.exit(1)

try:
    # jika exec memiliki data yang benar maka file decision tree pkl akan dijalankan
    with open('model_nilai.pkl', 'rb') as file:
        clf = pickle.load(file)
except FileNotFoundError:
    print("Error: 'model.pkl' file not found.")
    sys.exit(1)

# melakukan prediksi berdasarkan decision tree pkl dengan data yang di input
prediction = clf.predict([input_data])[0]
if prediction==0:
    hasil='GAGAL'
else:
    hasil='LULUS'
# mengembalikan variabel hasil prediksi ke php
print(hasil)