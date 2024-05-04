    <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">
        <div class="text-center pb-12">
            <h1 class="font-bold text-2xl md:text-3xl lg:text-4xl font-heading text-white shadow-sm">
                Conoce nuestros miembros 
            </h1>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="w-full bg-gray-950 bg-gradient-to-b rounded-lg sahdow-lg p-12 flex flex-col justify-center items-center">
                <div class="mb-8">
                    <img class="object-center object-cover rounded-full h-36 w-36" src="{{ asset('img/sneiPerfil.jpeg') }}" alt="photo">
                </div>
                <div class="text-center">
                    <p class="text-xl text-white font-bold mb-2">Sneider Vaca</p>
                    <p class="mb-3 text-base text-gray-400 font-normal">Desarrollador</p>
                    
                    @component('components.icons-socialMediaCard')
                        @slot('instagramLink', 'https://www.instagram.com/sneider.vrod/')
                        @slot('linkedinLink', 'https://www.linkedin.com/in/sneider-vaca-2001/')
                        @slot('githubLink', 'https://github.com/sneidervrod1')
                    @endcomponent
                </div>
            </div>
            <div class="w-full bg-gray-950 bg-gradient-to-b rounded-lg sahdow-lg p-12 flex flex-col justify-center items-center">
                <div class="mb-8">
                    <img class="object-center object-cover rounded-full h-36 w-36" src="{{ asset('img/shalPerfil.jpg')}}" alt="photo">
                </div>
                <div class="text-center">
                    <p class="text-xl text-white font-bold mb-2">Shalom Cristancho</p>
                    <p class="mb-3 text-base text-gray-400 font-normal">Desarrolladora</p>
                    @component('components.icons-socialMediaCard')
                        @slot('instagramLink', 'https://www.instagram.com/shalom_cristancho/')
                        @slot('linkedinLink', 'https://www.linkedin.com/in/shalom-cristancho-5600b427b/?originalSubdomain=co')
                        @slot('githubLink', '#')
                    @endcomponent
                </div>
            </div>
            <div class="w-full bg-gray-950 bg-gradient-to-b rounded-lg sahdow-lg p-12 flex flex-col justify-center items-center">
                <div class="mb-8">
                    <img class="object-center object-cover rounded-full h-36 w-36" src="{{ asset('img/metisLogo.png') }}" alt="Metis">
                </div>
                <div class="text-center">
                    <p class="text-xl text-white font-bold mb-2">Grupo Metis</p>
                    <p class="mb-3 text-base text-gray-400 font-normal">Grupo de investigación</p>
                    
                </div>
            </div>
            <div class="w-full bg-gray-950 bg-gradient-to-b rounded-lg sahdow-lg p-12 flex flex-col justify-center items-center">
                <div class="mb-8">
                    <img class="object-center object-cover rounded-full h-36 w-36" src="{{ asset('img/udPerfil.png') }}" alt="Metis">
                </div>
                <div class="text-center">
                    <p class="text-xl text-white font-bold mb-2">Universidad Distrital</p>
                    <p class="mb-3 text-base text-gray-400 font-normal">Centro Educativo</p>
                    @component('components.icons-socialMediaCard')
                        @slot('instagramLink', 'https://www.instagram.com/universidaddistrital/')
                        @slot('linkedinLink', 'https://www.linkedin.com/school/universidad-distrital-francisco-jos%C3%A9-de-caldas/?originalSubdomain=co')
                        @slot('githubLink', 'https://github.com/udistrital')
                    @endcomponent
                </div>
            </div>

    </section>
