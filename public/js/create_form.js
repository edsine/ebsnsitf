let fieldIndex = 0;

function addFormField() {
    const template = document.getElementById('form_field_template');
    const clone = template.content.cloneNode(true);
    const formFieldsDiv = document.getElementById('form_fields');
    formFieldsDiv.appendChild(clone);
    fieldIndex++;
}
