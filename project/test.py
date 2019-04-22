import os
filename = "test_check_io.txt"
with open(filename,'r') as file:
 life = file.read()
 print(life)
print("Name of the file:",file.name)
print("Closed or not:",file.closed)
print("Reading mode:",file.mode)
print("Softspave:",file.softspace)