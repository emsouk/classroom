<template>
  <div class="flex flex-col gap-4 mb-10">
    <h1 class="m-12 text-primary text-3xl text-center font-bold">Modules</h1>

    <div class="flex justify-center">
      <RouterLink
        to="/modules"
        class="w-56 py-4 bg-accent text-white text-2xl font-bold py-2 px-4 rounded-lg hover:bg-orange-500 transition-colors flex items-center justify-center gap-6 -translate-x-25 m-4"
      >
        Leçons
        <svg viewBox="0 0 96 96" class="w-10 h-10">
          <image
            id="image0_68_239"
            width="96"
            height="96"
            preserveAspectRatio="none"
            xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAAC8ElEQVR4nO2dP2sUQRyGBxWjVcpEsfFPhHwFw1mYWMWPED9CtNMiokWadIoIJmqhn0BiryZaWYpiBC2uMFUwIucJNj6yMCGrzt5dbmdmdzbvAwcH997Nbx6W2Z2ZZc8YIYQQQgghhGgywEXgIfAR+GFfG8ADYKbq+pIHOAus0581YKLqepMEOA9sMzjbQKvqulM8kvcieYevwJk+v50Km8AScDik6EGGiyJeNkT0DkshT3xlmW6Q6M1Qoh95KG6lQaIJJTq7hCvLhkT3F93xUFtHouOI/m4SJMWh44NJkNiis6l2WZZNgsQWPeNB9AWTIFFF2wafl5C8ZhKlCtEnga0QU/A6E120bbRlxe1FcsskTCWibcMT2drFAJJfpHwkVy46V8B0Nq3OLtvsdXbHvl9J9cRXS9H7BSQ6DhIdCYmOhERHQqKbLBo4AlwF3tj7OKriG3APONrEKfgJ4C31YjlYh3f77STkkVw3yRld4ECQTu/23UmoxrLhoo50myY6G5PryP0gHf67707qvGfok+yOqbuNOxl6FPQLuAYcN4mQqujrJjFSFX3MJEaSok2CSHQkJDoSEh0JiY6EREdCoi2ha4jZF4mO1BeJbopo0sT/Lo+vykyzRPvf5fFVkWmmaH+bD74qMhIt0bXY5cETplmi/e/y9GnwE3AKOA187hU0opToxVxuUaLDiZ7P5a5IdDjRc7ncZYkOJ3o2l7sk0eFEn8vlpiQ6nOjJXG5SosOJHs/lxiU6nOiRXG5EokvQw13Xkf0p0f5Ff3Fks0eWORm2/X0DxbxzZN8XhY0YWvQrR/a1RPsXverIPpNo/6IfO7JPJNq/6NuO7B2J9i/6piN7S6L9i553ZAuXSo0YWvScI1u4VGrE0KJnHdnCpVIjhhY95cgWLpUa0Rug7fD2GxhzZMfsZ//Srqb6hABu/KcNnvbIrzryC3GrThDgkJXdtg8ZzJ4ENtojP2r/JmTLfmcBOBi3aiGEEEIIIYQQpog/NvqVQPjH5wIAAAAASUVORK5CYII="
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
            id="image0_68_240"
            width="90"
            height="90"
            preserveAspectRatio="none"
            xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAACfUlEQVR4nO2bsWobQRRFp7EJwv60dKnzH1bqYOk30qXOL0VyCKmCcXuMyAbMgpLV6N7ZfbPvVMaYO8eXYeat0JaSJEmSJEmSDAAb4APwFfgJ/Bp+Pv1u8/fvkgqAd8B74Avwm/O8AN+Aj8B9zVqrg+nlZukzlHuOLB1fuVk67ctdT+mjaeH5yoKe30wajszNmnfuy5vdd9dwrWXu9JblnqPb0pdQbrelL7nc8KVHLDdU6cANsOv1Zkc/EZ26uqkR2fdWboPS9zWL/+i5XFPpTzULHtdSrrD0Y80ipzNncRfaXEy8SD/XXob74Qg59rxzr9zpp26egMeqyzBJkkQIcDuc3VOmkjGH4ZK9VTp1yT+mkUvYzf1/LJ7KnXz9YL82EFHm849x9HVQ9C7E0YeIMhNhjj5ElJkI4x9GNLp/GNHo/qP1HqbcwPy56bdTRN1TwXX1/t9fxmi9S74OcD9F1D0VIKK4Ga23vWBHf5oiOuzKazlM9K+muHGL0jZffvTJaFyEO19+9MloXIQ7X370yWhcRLh8GW5RgufLcIsSPF+GWxT/A5HVX4ZbFP8DkdVfhlsU/wOR1V+GW5Tg+TLcogTPl+EWJXi+DLcowfNluEUJni/DLUrwfBluUYLny3CLEjxfhluU4Pky3KIEz5fhFiV4vgy3KMHzZTT+GPMhWr6Mxh9j3kXLl9H4Y8xttHwZiCid5stwixI8X4ZblOD5MqJPBZjzZUSfCjDny4g+FWDOl4GI0mm+DLcowfNluEUJni/DLUrwfBluUYLny3CLEjxfhuhlnu+95ssQvZ722Gu+jGF431XujMOEFy5D5ydJkiRJkiRJkiRJkpQV8AqyCzcZFxJz5QAAAABJRU5ErkJggg=="
          />
        </svg>
        Exercices
      </RouterLink>
    </div>

    <div class="flex justify-center">
      <RouterLink
        to="/modules"
        class="w-56 py-4 bg-accent text-white text-2xl font-bold rounded-lg hover:bg-orange-500 transition-colors mx-auto flex items-center justify-center gap-6 -translate-x-25 m-4"
      >
        Favoris
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
        class="w-56 py-4 ml-100 bg-accent text-white text-2xl font-bold rounded-lg hover:bg-orange-500 transition-colors flex items-center justify-center gap-8 -translate-x-15 m-4"
      >
        <svg viewBox="0 0 96 96" class="w-10 h-10 ml-4">
          <image
            id="image0_137_97"
            width="100"
            height="100"
            preserveAspectRatio="none"
            xlink:href="data:image/png;base64,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"
          />
        </svg>
        Editeur de code
      </RouterLink>
    </div>
  </div>
</template>
