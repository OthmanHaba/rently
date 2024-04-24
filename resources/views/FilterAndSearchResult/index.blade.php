<x-app-layout>
 {{--هذه القيم للاختبار فقط يحتاج المسح لاحقا--}}
    @php
        $Search_Value = 32;
        $City = "Tripole";
        $DateIn = "10 Feb";
        $DateOut = "12 Feb";
        $Rooms = "2";
        $Person = "4";
    @endphp

    {{--هذه القيم للاختبار فقط يحتاج المسح لاحقا--}}
    <div lang="en" class="flex flex-nowrap font-Cairo gap-8 p-8">
        {{--تقسيم الشاشة -- عناصر الجزء الأيسر --}}
        <div class="basis-3/4 pr-4">
            {{--محتويات أعلى صفحة الفلتر --}}
            <div class="flex mt-4 mr-2">
                {{--عناصر اعلى اليسار --}}
                <div class="flex-1 w-1/2 ...">
                    <h4 class="text-2xl">filter by  </h4>
                    {{--<p class="text-xs">تم ايجاد {{$Search_Value}} نتيجة لي : {{$City}} , من تاريخ {{$DateIn}}
                        الى {{$DateOut}} , {{$Rooms}} غرفة, {{$Person}} شخص</p>--}}
                    <p class="text-lg">{{$Search_Value}} results found: {{$City}} city, from {{$DateIn}} to {{$DateOut}},
                        {{$Rooms}} rooms, {{$Person}} person.</p>
                </div>
                {{--عناصر اعلى اليمين --}}
                <div class="text-right pt-4 flex-1 w-1/2 ...">
                    <select class="h-8 text-sm rounded-lg w-1/5 max-w-xs">
                        <option disabled selected>sort by</option>
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                    </select>
                </div>
            </div>
            {{--الكارد الخاصة بنتائج الفلتر --}}
            <div class="card lg:card-side bg-base-100 shadow-xl my-4">
                {{--الصورة --}}
                <figure class="w-1/4"><img class="rounded-2xl p-2" src="{{ asset('storage/1.png') }}" alt="Album"/>
                </figure>
                {{--جسم الكارد --}}
                <div class="card-body">
                    {{--تقسيم جسم الكارد من الداخل --}}
                    <div class="grid grid-cols-3 gap-4">
                        <div>
                            <h2 class="card-title">Mahary hotel</h2>
                            <br>
                            <p class="text-xs ">It is 1 km from the city centre</p>
                            <p class="text-xs leading-6">Swimming pool, Wi-Fi</p>
                            <p class="text-xs">3 rooms, 2 bathrooms</p>
                            <button class="btn btn-outline min-h-min h-7 mt-4">#Home</button>
                            <button class="btn btn-outline min-h-min h-7">#Discount</button>
                        </div>
                        <div></div>
                        <div class="grid gap-4 grid-cols-1">
                            <div class="text-left rating rating-md">
                                <input type="radio" name="rating-8" class="mask mask-star-2 bg-orange-400"/>
                                <input type="radio" name="rating-8" class="mask mask-star-2 bg-orange-400" checked/>
                                <input type="radio" name="rating-8" class="mask mask-star-2 bg-orange-400"/>
                                <input type="radio" name="rating-8" class="mask mask-star-2 bg-orange-400"/>
                                <input type="radio" name="rating-8" class="mask mask-star-2 bg-orange-400"/>
                            </div>
                            <div>
                                <p class="font-bold">100 DL For Night</p>
                            </div>
                            <div>
                                <p class="font-cairo">3 Nights, 2 Guest</p>
                            </div>
                            <div class="card-actions justify-end gap-4">
                                <button class="btn btn-error w-full min-h-min h-10 ">Book It</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--هنا كارد ثانية للتوضيح فقط ،، تحتاج ازالة بعد عمل الباكند فور --}}
            {{--شريط التنقل بين صفحات النتائج --}}
            <div class="join block m-auto w-max">
                <button class="join-item btn">«</button>
                <button class="join-item btn">Page 1</button>
                <button class="join-item btn">»</button>
            </div>
        </div>
        {{--عناصر الجزء الأيسر من الصفحة --}}
        <div class="basis-1/4 ml-2">
            {{--كارد البحث --}}
            <div class="card w-96 bg-base-100 shadow-xl my-2">
                <div class="card-body">
                    <h2 class="card-title">Search Result!</h2>
                    <p></p>
                    <div class="card-actions justify-center">
                        <div class="label">
                            <span class="label-text">Locathin?</span>
                        </div>
                        <input type="text" placeholder="Enter name city" class="input input-bordered input-error w-full max-w-xs" />
                        <div class="label">
                            <span class="label-text">Chick In:</span>
                        </div>
                        <input type="date"  placeholder="Enter your check-in date" value="2024-01-01" class="input input-bordered input-error w-full max-w-xs" min="2024-02-01" max="2024-12-31" />
                        <div class="label">
                            <span class="label-text">Chick Out:</span>
                        </div>
                        <input type="date" placeholder="Enter your check-out date" value="2024-01-01" class="input input-bordered input-error w-full max-w-xs" min="2024-02-01" max="2024-12-31"/>
                        <div class="label">
                            <span class="label-text">number of guests?</span>
                        </div>
                        <input type="text" placeholder="Enter number of guests" class="input input-bordered input-error w-full max-w-xs" />
                        <button class="btn btn-error w-full">Search</button>
                    </div>
                </div>
            </div>
            {{--كارد الفرز --}}
            <div class="card w-96 bg-base-100 shadow-xl my-2">
                <div class="card-body">
                    <h2 class="card-title">Public Filter</h2>
                    <div class="card-actions justify-center">
                        <div class="form-control">
                            <label class="cursor-pointer label">
                                <span class="label-text mr-2">Economic offers</span>
                                <input type="checkbox" checked="checked" class="checkbox checkbox-error" />
                            </label>
                            <label class="cursor-pointer label">
                                <span class="label-text mr-2">Economic offers</span>
                                <input type="checkbox"  class="checkbox checkbox-error" />
                            </label>
                            <label class="cursor-pointer label">
                                <span class="label-text mr-2">Economic offers</span>
                                <input type="checkbox"  class="checkbox checkbox-error" />
                            </label>
                        </div>
                    </div>
                    {{--الفرز حسب السعر --}}
                    <h2 class="card-title">Price</h2>
                    <div class="card-actions justify-center">
                        <div class="form-control">
                            <label class="cursor-pointer label">
                                <span class="label-text mr-2">Less than 50 DL</span>
                                <input type="checkbox"  class="checkbox checkbox-error" />
                            </label>
                            <label class="cursor-pointer label">
                                <span class="label-text mr-2">Between 50 and 100 DL</span>
                                <input type="checkbox"  class="checkbox checkbox-error" />
                            </label>
                            <label class="cursor-pointer label">
                                <span class="label-text mr-2">More than 150 DL </span>
                                <input type="checkbox" checked="checked" class="checkbox checkbox-error" />
                            </label>
                        </div>
                    </div>
                    {{--الفرز حسب التقييم --}}
                    <h2 class="card-title">Evaluation</h2>
                    <div  class="card-actions justify-center">
                        <div class="form-control">
                            <div class="rating">
                                <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
                                <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" checked />
                                <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
                                <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
                                <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      </x-app-layout>
