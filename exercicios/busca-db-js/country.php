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


        const country = document.getElementById("countries");
        const provinceP = document.getElementById('provinceP');
        const provincesOpts = document.getElementById('provinces');
        provinceP.style.color = 'lightgrey';
        provincesOpts.disabled = true;

        country.addEventListener('change', async (event) => {           
            const countryValue = event.target.value;  
            
            try {

                const response = await fetch(`http://localhost/php/exercicios/busca-db-js/provinces.api.php?country=${countryValue}`);
                if (!response.ok) throw new Error('Falha na comunicação com o servidor');
                const provincesList = await response.json();
                console.log(provincesList);
    
                provinceP.style.color = 'black';
                provincesOpts.disabled = false;
                provincesOpts.innerHTML = " ";
                o = document.createElement('option');                
                o.disabled = true;
                o.selected = true;
                o.text = 'Província...';
                provincesOpts.appendChild(o);

                for (let i = 0; i < provincesList.length; i++) {
                    const option = document.createElement('option');
                    option.text = provincesList[i].province;
                    provincesOpts.appendChild(option);
                };

            } catch (error) {
                console.error("Erro ao buscar dados:", error.message);
            }
        });

    </script>
</body>

</html>