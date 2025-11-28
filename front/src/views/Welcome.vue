<template>
  <div class="flex flex-col gap-4 mb-10">
    <h1 class="m-12 text-primary text-3xl text-center font-bold">
      Bienvenue sur votre espace<br />
      Down the code
    </h1>

    <div class="flex justify-center">
      <RouterLink
        to="/modules"
        class="w-56 py-4 bg-accent text-white text-2xl font-bold py-2 px-4 rounded-lg hover:bg-orange-500 transition-colors flex items-center justify-center gap-6 -translate-x-25 m-4"
      >
        Modules
        <svg viewBox="0 0 96 96" class="w-10 h-10">
          <image
            width="96"
            height="96"
            xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAACXBIWXMAAAsTAAALEwEAmpwYAAABqUlEQVR4nO3RgQ0DIBDDQPZf2p0AqdIHsNrcAK8Y1qqqqqqqqqqqqqqqcuOi9UPbYsyRiLfFmCMRb4sxRyLeFmOORLwtxhyJeFvMiUGEbpq3xZgjEW+LMUci3hZzMzLF1jtyMzLF1jtyMzLF1jtyMzLF1jtyMzLF1jtyMzLF1rtOD3r1cIi3xZgjEW+LMUci3hZjjkS8LcYciXhbjDkS8baYE4M4/HC23pF+wPzmCBunbzJg6x3pB8xvjrBx+iYDtt6RfsD85ggbhpuIt8WYIxFvizFHIt4WY45EvC3GHIl4W4w5EvG2GHMk4m0x5kjE22LMkYi3xZgjEW+LMUci3hZjjkS8LcYciXhbjDkS8bYYcyTibTHmSMTbYsyRiLfFmCMRb4sxRyLeFmOORLwtxhyJeFvMN4MIWaGbp7dd9SoSwZ3dzateRSK4s7t51atIBHd2N696FYngzu7mVa8iEdzZ3bzqxCBCN83bYsyRiLfFmCMRb4sxRyLeFmOORLwtxhyJeFvMbtC/Wf2At/oBj/UDHusHPNYP+NcPqKqqqqqqqqqqqqpaX/kAiu6ra16innoAAAAASUVORK5CYII="
          />
        </svg>
      </RouterLink>
    </div>

    <div class="flex justify-center">
      <RouterLink
        to="/modules"
        class="w-56 py-4 ml-100 bg-accent text-white text-2xl font-bold rounded-lg hover:bg-orange-500 transition-colors flex items-center justify-center gap-8 -translate-x-15 m-4"
      >
        <svg viewBox="0 0 96 96" class="w-10 h-10">
          <image
            id="image0_57_176"
            width="96"
            height="96"
            preserveAspectRatio="none"
            xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAACXBIWXMAAAsTAAALEwEAmpwYAAADQUlEQVR4nO2bMWsUQRiGpxKxEjFCUHtF1EJIpa0WYpNK/4GdCOkszG+ItU0Km1gI/gnBTkgnaqWQiCABkeTwkYlbnHc3t3fZnZ139/seCAQuA+8zb2ZnbpILwXEcx3Ecx3Ecx3Ecx3Ecx3G0wTnGCyiMF1AYL6AwXkBhvIDCyBUQBgpqvnKBrPnKBbLmKxfImq9cIGu+coGs+coFsuYrF8iar1wga75NAiFGyOybhRwypcjtm4UcMqXI7ZuFHDKlyO2bhRwypcjtm4UcMqXI7ZsFuUDWfOUCWfOVC2TNVy6QNV+5QNZ85QJZ820SiMwEMd+gFijbzFeo+Qa1QGQmiPkGtUDZZr5CzTeoBSIzQcw3qAXKNvMVar7BRCBrvnKBrPnKBbLmKxfImq9cIGu+coGs+coFGgN4D7wFNoEHwEoYmq9coDGANzOifZ0o5Wzos69coDGAZ9QzAnaBbeAJcBs43RtfuUBjAHc5Gb+Bd8BNeV+5QGMA54A/nJwfwC1pX7lAEwAfGxQwVYKcr1ygCYBXDQv4rwQ5X7lAEwBPExF/Ad+XKGE/7glyvnKBJgDupCa0en212qw3qpPQYU0JWr5ygSYAzgBHiZirM37+fnUKWopQCrlAMwA+JGLeS/z80iWEUsgFmgHwMhFzY86YpUoIpZALNAPgcSLmds249Zo9obyvXKAZxCPknGuIhzVjF1oJoRRygWYAnJozifE3fL2FlTB1bdEJfSggUt3tkLGE4/cJoWt6VMCNeef4BR9HdSVM3R1lpy8FDLaEPhUwyBL6VsDgSuhjAYMqgWEzki+B4TNqoYS9uOK8gGYlPJIsATuMWirhuhcwpBKwx2EL1xaxhGutlTA0WOyI2nQlfAEudGfVM/j3B/j9zCvhdXdGw1wJhw1LiP80ttadke0SjhLjX3RnY7uEzcTY3e5MegxwFfh20o0ZuJgYd9CtidESgMuJMT+7N+n/42hv2ceRP4JaJL6TrSkhbrjPq8fOpWryU5vwVpvZzEB9CYvgx9DCJew0CuCEWMKVmo05hV9FtEW8WAM+LzH5n+KJqrUAToglrMS7nZrPpMXXdoDzpfMOFmAtXi9UH309qL7i91upDfcvfQeTYQbKMpgAAAAASUVORK5CYII="
          />
        </svg>
        Blog
      </RouterLink>
    </div>

    <div class="flex justify-center">
      <RouterLink
        to="/modules"
        class="w-56 py-4 bg-accent text-white text-2xl font-bold rounded-lg hover:bg-orange-500 transition-colors mx-auto flex items-center justify-center gap-6 -translate-x-25 m-4"
      >
        Mes favoris
        <svg viewBox="0 0 96 96" class="w-10 h-10">
          <image
            id="image0_57_179"
            width="96"
            height="96"
            preserveAspectRatio="none"
            xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAACXBIWXMAAAsTAAALEwEAmpwYAAAE4ElEQVR4nO2bS4xVRRCGjwYYSXAW4mIQFBE1RBPWhIVBMQbcwNrEhUbjI7p3oQF14xJEt4poTNgQcWTu3RMfGF+JuPOxUNFEo4OiTkT9TIe+yfV6qu95VN8+j/q201NV/f+n+/SpnskywzAMwzAMwzAMwzAMwzAMw2gvwK3A48BR4D3gHHCeS/wEfAGcBl4A7gO2lIidS4nf3wLc73Of9rW4mvA1ulrfBV4GHgNuydoAcD3wNPAV1fgYeAq4RtsAF9PH/qRibV/6uW3OmgZwI/AKcBEd/gSOB/LlEhh/3MfUqs2t6q1ZaoAr/FOxQgQyOa/K+Jr8ARwE5rKE280ZIpLJuVXGK/GR2wGiCS1M6PaxF2o0spKClh2vyDKwK5rgE5PZV3DL+cefJNwy3eNPHvPA5cACsB3YDxwCzmoIWnL8WZ97v69lwdc272vd67dXd4IrgtNkXzThx578aeL/BhwuuyyBbf73liMa8LMXfVvJ2m4Cngd+L/BeiLMSfBHTtp0TwLU181wJPANcUDTggn+a19Ws7Trg5BQNltXfCf604142Em5VPKicc4OiARuUa3t4yk7woerpyD+REr+4rUktWQHKGhADYLefu8QBzY8sye2VWYvfFAPGTFgJvA9u0EjivnAlHlCZSUsNGNuOJF7S+NiS2gsn1GbRYgN8PW8E2hbVe0f+5CAdNWuddjpmwGa/5eRxsGrQy3wHMI/D6rNosQG+JtfazuPzOv186Qt3tr2Pdhhws1RX2Q+/UUB3mZLHO1Fm0HIDfF3vC6U9qnn6qban9cOAZ9VOQ76RlseeKNV3w4C7hdLerhLsWyFY4bvbHhqwVSjtmyrBfhWC1WpoddyAeaG081WC/SUEWx2l+m4YsFoo7WKVYFLreWOU6rthwCahtOUqwT4Tgt0VpfoJgFVaBoRiaeJv/vL4tEqw14Vgh6JUP4a/xlySeuplDHAxfKzox2d/a5bHa1WC3SsE+wFYG1n8EUN3GZQzJpeccWuAN8eGPBex7rXAj0Jp91QJeHXgRfzQDMQf8b+VgIDw5E8SZSUAjwhlOQ3XVw36lhD0nPZxlHzxc02YZkBA/CgmOC2A74Rci3UC7wpM4ojiBFZNEew/JoQMKCD+KJbaixl4MZDrtrrBzwS6onsVJzFX1ITAzwvHUG4/OC3iNC6BnYEEbtktJDBBYtbiuz/m+l7I5TTboZUodC/8geb7gGImVEFb/HV+7hJHM8Vk611DKZBsqDy5OWUTliLU5+Ys8TVwlVa+UdI7gb9nPMmlhoofqstpdIdWvsnkT06ZbO6HU418ayY+pMqSop4ntPJJF/WvTimgKSthKUEdx5xGWjlDLdfFBk4+df7FmbXq/VI82dDtaJgg70AzZ5tNGPZC/IaaMOyV+A0zYdhL8RtiwrDX4k+cFKT2dczTydyMTzunkv1vcBNXQtb3J78LJtAV8dtoAl0Tv00m0FXx22ACXRe/ySbQF/GbaAJ9E79JJtBX8ZtgAn0Xv2G9o36Kn8IETPx0JmDipzMBEz+dCZj46UzAxE9nAiZ+OhMw8dOZgImfzgRM/Dhw6X7W3b+GOFVwTDPvcDuyEkLYk5/QhIGJn86EgYmfzoSBiZ/OhIGJn86EgYmfzoSBiZ/OhIGJnwiU/zjXMAzDMAzDMAwjmwH/Ank0c6Cz4vr5AAAAAElFTkSuQmCC"
          />
        </svg>
      </RouterLink>
    </div>

    <div class="flex justify-center">
      <RouterLink
        to="/modules"
        class="w-56 py-4 ml-100 bg-accent text-white text-2xl font-bold rounded-lg hover:bg-orange-500 transition-colors flex items-center justify-center gap-6 -translate-x-15 m-4"
      >
        <svg viewBox="0 0 96 96" class="w-10 h-10">
          <image
            id="image0_57_186"
            width="96"
            height="96"
            preserveAspectRatio="none"
            xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAACXBIWXMAAAsTAAALEwEAmpwYAAADIElEQVR4nO3buWuUQRjH8QmeBOOBByqCWkYEKwship0IitqqEUsbi2CniFcl2ATxQgvBwkILkYC1lTaCqHj8AR6dBwpGg195zVukyLvvrDvzPvPu/D6tm32fme8a3t2dOCciIiIiIiIiIlIB6UgBjCmAMQUwpgDGFCDXAC4zKIAtBTCWdIAmH2NFAYwpgDEFMKYAxhTAWNIBcoAC2FIAY8kFkGkKYEwBjCmAMQUwpgC5BnCZQQFsKYAxBTCmAMYUwJgCGFMAYwpgTAGMKYAxBTCmAMYUwJgCGJtlC54BBywunHOASeA+sAsY8Py5rSEurAAwBqzs4vGDwCVgqtcLK0CXgO3A2yB7pQD+gFXALeBPsL1SgHrAcuAM8DX4XilANWA1cBb4UrVPChAYMAfYDdwt74pq9XrB7AMAi4B9wHXgg8+mK0CXgAXAGmBTeRdzrNzwJ8DPbjc9uwAkLMrCXGKw97vqH6IszCUGO9+AcWBD1QOiLMwlhmYVdz8TwBFgqG6GKAtziSGuKeA5cBU4BCzrZoYoC3OJIZzilX0NOAmMlndEQz3OMBh8YS4xdDlnjHV1CPAS2NjIwqyQdoDCO2Bp9IVZIf0AhfPRF2aFdgR4HX1hVmhHgB/RF2aFdgTQ/wDjAOeCPalLDOkHKL4j1l2QUYAXxWdFQZ/UJYbw74RPle+Ed+idcLMBOn0WdAU4WPWrJMpeRXnSCGhW8Q3ZQ+Bw8XVl3QxtWtisPOcsPpe38Bm4CKzLPcCE8Zi/cg8wRqJyCbDZ81W6uMOpiOKg1TAwMuNUxFPf8z+5BxgAPno83d7/2IMhYD9wA/gUY/5OFzfn/Ge94/F04z3ux1xgD3Cv00mI/5m/9YCjHvvxKuD11pcnIr4rgPu3IZW3gjMUR8fXBr7uivKQbvjT0W0DvPGIMBrx7wNuBv37gLYBLnsEuB15hpGZLwSXE6bvVuq8b2COheWvpUmXE2CJ593JcEPzbHG5YfpIeZ3j1nP2LeCCR4AH1nP2LWCnR4Di09N51rP2JWB+3Zuj0jbrWfsW8MgjwGnrOfsWcMIjwOOmB/sLZgZYbn/hEhcAAAAASUVORK5CYII="
          />
        </svg>
        Veille techno
      </RouterLink>
    </div>
  </div>
</template>
