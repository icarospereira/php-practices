<html>

<head>
    <title>Exercicio DB-JS-PHP</title>

</head>

<body>
    <p>País:
        <select id="countries">
            <option value="" disabled selected>País...</option>
            <option>Portugal</option>
            <option>Espanha</option>
        </select>
    </p>
    <p id="provinceP">Província:
        <select id="provinces">
            
        </select>
    </p>

    <script type="text/javascript">
        
        const countrySelect = document.getElementById('countries');
        const provinceWrapper = document.getElementById('provinceP');
        const provinceSelect = document.getElementById('provinces');

        
        const resetProvinceSelect = () => {
            provinceWrapper.style.color = 'lightgrey';
            provinceSelect.disabled = true;
            provinceSelect.innerHTML = '';
        };

        resetProvinceSelect();

        countrySelect.addEventListener('change', async (event) => {
            const countryValue = event.target.value.trim();
            
            if (!countryValue) {
                resetProvinceSelect();
                return;
            }

            try {
                const url = `http://localhost/php/exercicios/busca-db-js/provinces.api.php?country=${encodeURIComponent(countryValue)}`;
                const response = await fetch(url);

                if (!response.ok) {
                    throw new Error(`HTTP ${response.status}: Falha na comunicação com o servidor`);
                }

                const provincesList = await response.json();

                
                if (!Array.isArray(provincesList) || provincesList.length === 0) {
                    console.warn('Nenhuma província encontrada');
                    resetProvinceSelect();
                    return;
                }

                const fragment = document.createDocumentFragment();
                
                const defaultOption = document.createElement('option');
                defaultOption.disabled = true;
                defaultOption.selected = true;
                defaultOption.textContent = 'Província...';
                fragment.appendChild(defaultOption);
                
                provincesList.forEach(({ province }) => {
                    const option = document.createElement('option');
                    option.textContent = province;
                    option.value = province;
                    fragment.appendChild(option);
                });

                provinceSelect.innerHTML = '';
                provinceSelect.appendChild(fragment);
                

                
                provinceWrapper.style.color = 'black';
                provinceSelect.disabled = false;

            } catch (error) {
                console.error('Erro ao buscar províncias:', error.message);
                resetProvinceSelect();
            }
        });
    </script>
</body>

</html>