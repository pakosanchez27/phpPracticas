


<!DOCTYPE html>
<html>
<head>
  <title>Formulario de registro</title>
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body class="body-formulario">
  <form>
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>
    
    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    
    <label for="fecha_nacimiento">Fecha de nacimiento:</label>
    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
    
    
    
    <label for="sexo">Sexo:</label>
    <select id="sexo" name="sexo" required>
      <option value="">Seleccione su género</option>
      <option value="masculino">Masculino</option>
      <option value="femenino">Femenino</option>
      <option value="otro">Otro</option>
    </select>
    <label>Plan:</label>
    <div class="planes">

        <label for="plan_basico">Básico:</label>
        <input type="radio" id="plan_basico" name="plan" value="basico">
        <label for="plan_intermedio">Intermedio:</label>
        <input type="radio" id="plan_intermedio" name="plan" value="intermedio">
        <label for="plan_premium">Premium:</label>
        <input type="radio" id="plan_premium" name="plan" value="premium">
        
        
    </div>
   
    <div>
      <button type="reset">Limpiar</button>
      <button
      type="submit">Enviar</button>
    </div>
</form>
</body>
</html>