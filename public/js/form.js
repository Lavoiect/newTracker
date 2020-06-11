function showType() {

    var newSection = document.getElementById('new');
    var updateSection = document.getElementById('update');
    var requestType = document.forms["intakeForm"]["requestType"].value;

    if (requestType === "New") {

        newSection.style.display = 'block';
        if (updateSection.style.display == 'block') {
            updateSection.style.display = 'none';
        }
    } else if (requestType === "Update") {
        updateSection.style.display = 'block';
        if (newSection.style.display == 'block') {
            newSection.style.display = 'none';
        }
    } else {

        if (updateSection.style.display == 'block') {
            updateSection.style.display = 'none';
        } else if (newSection.style.display == 'block') {
            newSection.style.display = 'none';
        }
    }
}
