<x-app-layout>
    <section class="text-center py-16 bg-gray-900 text-gray-100">
        <h1 class="text-5xl font-extrabold text-yellow-400 mb-6 animate-pulse">
            Welcome to the Camaro Garage
        </h1>
        <p class="max-w-2xl mx-auto text-lg text-gray-300">
            Step into the world of <span class="text-yellow-400 font-semibold">Chevrolet Camaro</span> —
            a true American muscle car icon that has ruled the streets since 1967.
            From the roaring V8 engines to sleek aerodynamic lines, every Camaro tells a story of power, performance, and style.
        </p>
    </section>

    <section class="bg-gray-800 py-16 border-t border-yellow-400">
        <div class="max-w-5xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-yellow-400 mb-4 text-center">
                About the Camaro Legacy
            </h2>
            <p class="text-gray-300 leading-relaxed text-center">
                The Chevrolet Camaro was introduced as a direct competitor to the Ford Mustang,
                combining raw horsepower with refined design. Over the decades, the Camaro evolved through six generations —
                each pushing the limits of performance and technology.
            </p>
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="p-6 bg-gray-900 rounded-lg shadow-lg hover:shadow-yellow-400/20 transition">
                    <h3 class="text-xl font-semibold text-yellow-400 mb-2">1st Generation (1967–1969)</h3>
                    <p class="text-gray-400">The classic era — iconic styling, aggressive stance, and a legend was born.</p>
                </div>
                <div class="p-6 bg-gray-900 rounded-lg shadow-lg hover:shadow-yellow-400/20 transition">
                    <h3 class="text-xl font-semibold text-yellow-400 mb-2">4th Generation (1993–2002)</h3>
                    <p class="text-gray-400">Refined aerodynamics meet raw V8 power — a new era for muscle cars.</p>
                </div>
                <div class="p-6 bg-gray-900 rounded-lg shadow-lg hover:shadow-yellow-400/20 transition">
                    <h3 class="text-xl font-semibold text-yellow-400 mb-2">6th Generation (2016–2024)</h3>
                    <p class="text-gray-400">Modern technology meets tradition — lighter, faster, and more precise than ever.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-900 py-20 text-center border-t border-yellow-400">
        <h2 class="text-3xl font-bold text-yellow-400 mb-4">Coming Soon</h2>
        <p class="text-gray-300 max-w-xl mx-auto mb-6">
            Soon, you’ll be able to explore our full Camaro collection, add your own models, and share your passion
            with other enthusiasts. Stay tuned for the official Camaro Exhibition!
        </p>
        <a href="{{ route('camaro.camaroExhibition') }}"
           class="inline-block bg-yellow-400 text-gray-900 font-bold px-6 py-3 rounded hover:bg-yellow-300 transition">
            Visit the Exhibition
        </a>
    </section>
</x-app-layout>
