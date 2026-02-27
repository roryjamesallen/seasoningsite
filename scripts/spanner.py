output = ''
string = input("> ")
for letter in string:
    if letter == ' ':
        letter = ''
    output += '<span>'+letter+'</span>'
print(output)
exit()
