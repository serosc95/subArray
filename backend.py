import pandas as pd
from openpyxl import load_workbook

def findRepeat(subarray):
    newList = []
    for x in subarray:
        if x not in newList:
            newList.append(x)
        else:
            return 0
    return 1

writer = pd.ExcelWriter('database.xlsx', engine='openpyxl')
wb  = writer.book
datos = pd.read_csv("data_vector.csv", header=None)
subarray = []
data=[]
i = 1

for x in range(datos.shape[0]):
    try:
        subarray.append(datos.at[x,0])
        contador = 0
        for y in subarray:
            contador = contador + y
        if contador > 52 or findRepeat(subarray) == 0:
            subarray.clear()
        elif contador == 52:
            print(subarray)
            data.append({'id': i, 'array': subarray.copy()})
            i = i + 1
            subarray.clear()
    except:
        break

df = pd.DataFrame(data)
df = df[['id', 'array']]
df.to_excel(writer, sheet_name='Hoja1', index=False)
wb.save('database.xlsx')
