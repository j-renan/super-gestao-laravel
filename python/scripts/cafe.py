mos1 = 26
meses_apos_plantio = 3
fonte = 100
base = 2
fonte = fonte / 100
dose = 0

#def nitrogenio_cafe(mos1, meses_apos_plantio, fonte, base):

print('mos', mos1)
def nitrogenio_plantio(meses_apos_plantio):
    dose_plantio = 0
    if meses_apos_plantio < 6:
        dose_plantio = 3
        print('Dose plantio < 6', dose_plantio)
    elif 6 <= meses_apos_plantio <= 19:
    #elif meses_apos_plantio > 6 and meses_apos_plantio <=19:
        dose_plantio = 7
    return dose_plantio

def nitrogenio_producao(mos1):
    dose_producao = 0
    if mos1 < 15:
        dose_producao = 100
    elif 15 <= mos1 <= 40:
        dose_producao = 80
    elif mos1 > 40:
        dose_producao = 60
    return dose_producao

if (meses_apos_plantio < 19):
    dose = nitrogenio_plantio(meses_apos_plantio)
else:
    dose = nitrogenio_producao(mos1)
dose = dose / fonte
dose = dose * base
print(dose)

