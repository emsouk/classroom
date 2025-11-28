<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 p-4">
        <!-- Card -->
        <div class="relative w-full max-w-sm rounded-2xl overflow-hidden shadow-lg">
        
        <!-- Background violet avec diagonale -->
        <div class="absolute inset-0 bg-secondary clip-diagonal"></div>
            
        <!-- Form content -->
        <div class="relative p-6 flex flex-col gap-4">
            <p class="text-white text-5xl">...</p>
            <!-- Title -->
            <h1 class="font-coiny text-4xl text-accent font-bold text-center">
            DOWN<br>THE CODE
            </h1>

            <!-- Form -->
            <form class="flex flex-col gap-4">
            <div class="relative">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-green-400">
                📧
                </span>
                <input
                type="email"
                placeholder="Email"
                class="text-white w-full pl-10 pr-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-400 bg-white/50"
                />
            </div>
            <div class="relative">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-green-400">
                🔒
                </span>
                <input
                type="password"
                placeholder="Mot de passe"
                class="text-white w-full pl-10 pr-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-400 bg-white/50"
                />
            </div>

            <button
                type="submit"
                class="bg-login text-black py-2 rounded-lg hover:bg-green-500 transition-colors w-40 mx-auto"
            >
                Connecte toi !
            </button>
            </form>

            <!-- Links -->
            <p class="text-white text-sm mt-2">
            Ou inscris toi par <a href="#" class="underline">ici</a><br/>
            <a href="#" class="underline">Mot de passe oublié</a>
            </p>
        </div>
        </div>
    </div>
</template>

<style>
/* Diagonale sur le fond violet */
.clip-diagonal {
    clip-path: polygon(0 0, 20% 0, 100% 100%, 0% 100%);
}
</style>