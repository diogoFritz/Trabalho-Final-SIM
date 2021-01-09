<body>
        <h1>Formulário Médico</h1>
        <form action="index.php?option=diagnostico" method="POST">
            

            <h2>Ola! Bem vindo à consulta que lhe irá informar qual o seu grau de risco de ter COVID</h2>
            <h3>Terá de selecionar as seguintes opções para que o nosso classificador dar o resultado (selecionar em caso afirmativo)</h3>

            <input type='hidden' value='0' name='symptoms_progressed'>
            <input type='hidden' value='0' name='travel_history'>
            <input type='hidden' value='0' name='drowsiness'>
            <input type='hidden' value='35' name='body_temperature'>
            <input type='hidden' value='0' name='dry_cough'>
            <input type='hidden' value='0' name='chest_pain'>
            <input type='hidden' value='0' name='stroke'>
            <input type='hidden' value='0' name='diabetes'>
            <input type="checkbox" name="symptoms_progressed" value=1 > - Os seus sintomas progrediram?
            <br>
            <input type="checkbox" name="travel_history" value=1> - Viajou para algum país infetado?
            <br>
            <input type="checkbox" name="drowsiness" value=1> - Tem tido sonolência?
            <br>
            <input type="checkbox" name="dry_cough" value=1> - Tem tosse seca?
            <br>
            <input type="checkbox" name="chest_pain" value=1> - Tem dor no peito?
            <br>
            <input type="checkbox" name="stroke" value=1> - Já teve algum AVC ?
            <br>
            <input type="checkbox" name="diabetes" value=1> - Tem diabetes?
            <br>
            <input type="number"  name="body_temperature" min="30" max="50" value="30"> - Qual a sua temperatura corporal?
            <br>
            <br>
            <input type="submit">
        </form>
</body>