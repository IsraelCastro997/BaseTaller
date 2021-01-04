
    if(window.history.replaceState) { // verificamos disponibilidad
        console.log("probando");
        window.history.replaceState(null, null, window.location = 'index.php')
    }
