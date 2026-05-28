<x-layouts::app>
    <div class="min-h-screen flex flex-col justify-center items-center py-12">
        <div class="max-w-4xl w-full mx-auto px-4">
            <flux:text class="w-full mb-12 border-2 p-6 rounded-2xl text-2xl bg-white/5 backdrop-blur-sm">
                Kirby is a media franchise created by Masahiro Sakurai and owned by HAL Laboratory. The franchise revolves around Kirby, the series' titular protagonist, and his adventures in the fictional world of Pop Star. It debuted in Japan on April 27, 1992, with Hoshi no Kirby, which later was released in North American and PAL regions in August 1992 as Kirby's Dream Land.
            </flux:text>
            <div class="flex justify-center">
                <img class="max-h-64 object-contain" src="{{asset('storage/photos/Kirby_Nintendo.png')}}" alt="kirby">
            </div>
        </div>
    </div>

    <div class="bg-red-100 text-slate-900 min-h-screen flex flex-col justify-center items-center relative left-1/2 right-1/2 ml-[-50vw] mr-[-50vw] w-screen py-16">
        <div class="max-w-5xl w-full mx-auto px-4 flex flex-col md:flex-row items-center gap-8">
            <flux:text class="w-full md:w-2/3 border-2 border-red-200 p-6 rounded-2xl text-2xl bg-white text-slate-800 shadow-sm">
                The franchise mainly consists of a video game series, which in turn mainly consists of platform games, where a common gameplay element is Kirby's ability to copy enemy skills, allowing him to use them to progress through levels. This and other changes in gameplay from traditional platform games distinguish the series from other entries in the genre. The series also includes other genres like puzzle and racing games. All Kirby video games have been developed for Nintendo video game consoles and handhelds dating from the Game Boy to the Nintendo Switch 2. Sakurai conceived the franchise as a game series for beginners, to which he partially attributes the series' success.[6] Currently, the video game series contains thirty-nine games with over fifty million games sold worldwide, making it one of the best-selling video game franchises.
            </flux:text>

            <div class="w-full md:w-1/3 flex justify-center">
                <img class="max-h-64 object-contain" src="{{asset('storage/photos/kirbyjump.png')}}" alt="kirby">
            </div>

        </div>
    </div>

    <div class="bg-red-200 text-slate-900 min-h-screen flex flex-col justify-center items-center relative left-1/2 right-1/2 -ml-[50vw] -mr-[50vw] w-screen py-16">
        <div class="max-w-5xl w-full mx-auto px-4 flex flex-col md:flex-row items-center gap-8 ">
            <div class="w-full md:w-1/3 flex justify-center">
                <img class="max-h-64 object-contain" src="{{asset('storage/photos/mariikirby.png')}}" alt="Kirby">
            </div>
            <flux:text class="w-full md:w-2/3 border-2 border-red-200 p-6 rounded-2xl text-2xl bg-white text-slate-800 shadow-sm">
                On top of the video games, a one-hundred episode anime series based on the video games, Kirby: Right Back at Ya!, was created in Japan and formerly distributed by 4Kids TV in North America. A special 101st episode was created for the now retired Nintendo Video service, and was not in the anime style of the original 100 episodes.[8] The franchise has also redeived several manga series.
            </flux:text>


        </div>
    </div>
</x-layouts::app>
