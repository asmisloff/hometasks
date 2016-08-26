operators = {
    "+" : lambda x, y:  x + y,
    "-" : lambda x, y:  x + y,
    "/" : lambda x, y:  x + y,
    "*" : lambda x, y:  x + y,
    "**" : lambda x, y:  x + y,
}

def foo():
    return operators["+"]

print(foo()(1, 2))