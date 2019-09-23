def recurring(word):
    dic = {}
    for c in word:
        if c in dic:
            return c
        dic[c] = 1
print recurring("abbded")
