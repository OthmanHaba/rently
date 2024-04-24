<div>
    <div class="card card-side bg-base-100 shadow-xl">
        <figure><iframe src="https://visitedplaces.com/embed/?map=libya&projection=geoMercator&theme=dark-green&water=0&graticule=0&names=1&duration=2000&placeduration=100&slider=0&autoplay=0&autozoom=none&autostep=0&home=LY" style="width: 100%; height: 600px;"></iframe></figure>
        <div class="card-body">
            <h2 class="card-title">Enter Your Location!</h2>
            <label class="form-control w-full">
                <select name="select" id="select" wire:model.lazy="select" class="select select-bordered">
                    <option>City</option>
                    <option value="tripoli">Tripoli</option>
                    <option value="benghazi">Benghazi</option>
                    <option value="misrata">Misrata</option>
                    <option value="sabha">Sabha</option>
                    <option value="sirte">Sirte</option>
                    <option value="zawiya">Zawiya</option>
                    <option value="derna">Derna</option>
                    <option value="tobruk">Tobruk</option>
                    <option value="zintan">Zintan</option>
                    <option value="al-khums">Al-Khums</option>
                    <option value="ajdabiya">Ajdabiya</option>
                    <option value="murzuq">Murzuq</option>
                    <option value="al-marj">Al-Marj</option>
                    <option value="az-zawiyah">Az Zawiyah</option>
                    <option value="ghadames">Ghadames</option>
                </select>
            </label>
            @error('select') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
        </div>
    </div>
</div>
