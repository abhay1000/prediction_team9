import os
filename = "test_check_io.txt"

with open(filename,'r') as file:
 lines_of_file = file.read()
 print(lines_of_file.split())
 print("\n")
 print("Number of Words:",len(lines_of_file.split()))