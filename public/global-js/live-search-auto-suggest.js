function liveSearchAutofill(text) {
    let autofillDiv = document.getElementById('autofill');
    autofillDiv.innerHTML = '';
    let ul = document.createElement('ul');
    let url = '/live-search-autofill';
    let data = {
        Text: text,
    };

    axios.post(url, data).then(function(response) {
        // Clear previous results
        autofillDiv.innerHTML = '';

        // Check if there are any results
        if (response.data.length > 0) {
            response.data.forEach(function(item) {
                let li = document.createElement('li');
                li.textContent = item.title;
                li.addEventListener('click', function() {
                    document.getElementById('search').value = item.title;
                    autofillDiv.innerHTML = '';
                    autofillDiv.style.border = 'none'; // Remove border when item is selected
                });
                ul.appendChild(li);
            });

            autofillDiv.appendChild(ul);
            autofillDiv.style.display = 'block';
            autofillDiv.style.cursor = 'pointer';
            autofillDiv.style.border = '1px solid #ccc'; // Show border when there are suggestions
        } else {
            autofillDiv.style.display = 'none';
            autofillDiv.style.border = 'none'; // Hide border if no suggestions
        }
    }).catch(function(error) {
        console.error(error);
    });
}
