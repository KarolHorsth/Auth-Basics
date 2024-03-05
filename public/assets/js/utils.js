function handleValueInputMask() {
    document.querySelectorAll('.realMask').forEach((input) => {
        input.addEventListener('input', (e) => {

            let FieldValue = input.value

            FieldValue = FieldValue.replace(/\D/g, '');

            FieldValue = (FieldValue / 100).toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            });
        
            input.value = FieldValue;
        })
    })
}

handleValueInputMask()