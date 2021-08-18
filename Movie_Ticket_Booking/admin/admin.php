<html>
    <head>
        <style>
            * {
  box-sizing: border-box;
}

:root {
  --background: #FA8072;
  --background-accent: #DBF8A3;
  --background-accent-2: #BDE66E;
  --light: #92DE34;
  --dark: #69BC22;
  --text: #025600;
}

body {
  background-color: var(--background);
  background-image: linear-gradient(
    var(--background-accent-2) 50%,
    var(--background-accent) 50%
  ), linear-gradient(
    var(--background-accent) 50%,
    var(--background-accent-2) 50%
  );
  background-repeat: no-repeat;
  background-size: 100% 30px;
  background-position: top left, bottom left;
  min-height: 98vh;
}

div {
  display: block;
  width: 400px;
  margin: 0 auto 0 auto;
  position: absolute;
  left: 0;
  right: 0;
  top: 30vh;
}

button:hover {
  display: block;
  outline: none;
  border: none;
  background-color: var(--light);
  width: 400px;
  height: 70px;
  border-radius: 30px;
  font-size: 1.5rem;
  font-weight: 600;
  color: var(--text);
  background-size: 100% 100%;
  box-shadow: 0 0 0 7px var(--light) inset;
  margin-bottom: 15px;
  animation:none;
}

button {
    display: block;
  outline: none;
  border: none;
  background-color: var(--light);
  width: 400px;
  height: 70px;
  border-radius: 30px;
  font-size: 1.5rem;
  font-weight: 600;
  color: var(--text);
  background-size: 100% 100%;
  box-shadow: 0 0 0 7px var(--light) inset;
  margin-bottom: 15px;

  background-image: linear-gradient(
    145deg,
    transparent 10%,
    var(--dark) 10% 20%,
    transparent 20% 30%,
    var(--dark) 30% 40%,
    transparent 40% 50%,
    var(--dark) 50% 60%,
    transparent 60% 70%,
    var(--dark) 70% 80%,
    transparent 80% 90%,
    var(--dark) 90% 100%
  );
  animation: background 3s linear infinite;
}

@keyframes background {
  0% {
    background-position: 0 0;
  }
  100% {
    background-position: 400px 0;
  }
}
            </style>
</head>
    <body>
        <div>
<a href="home.php" style="text-decoration:none;"><button>ADD MOVIES</button></a>
<br>
<a href="screen.php" style="text-decoration:none;"><button>ADD SCREEN</button></a>
<br>
<a href="../create_user.php" style="text-decoration:none;"><button>ADD USER</button></a>
</div>

</body>
</html>
