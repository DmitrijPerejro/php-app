const inputChangeType = (buttonId, fieldId) => {

    const password = 'password';
    const text = 'text';
    const button = document.querySelector(`#${buttonId}`);
    const input = document.querySelector(`#${fieldId}`);

    button.addEventListener('click', () => {
        input.setAttribute('type', input.getAttribute('type') === password ? text : password)
    })
}