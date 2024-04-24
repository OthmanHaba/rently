<div x-data="dateRangePicker()" class="space-y-4 max-w-3xl mx-auto" x-init="initComponent" id="calender">
    <div class="flex justify-between items-center mb-4">
        <div class="w-full flex justify-between">
            <div>
                <span class="text-lg font-semibold {{$dayClass}}" x-text="`${currentMonthName} ${currentYear}`"></span>
            </div>
            <div>
                <span class="text-lg font-semibold {{$dayClass}}" x-text="`${nextMonthName} ${nextYear}`"></span>
                <button @click="changeMonth(1)" class="p-2 text-lg {{$dayClass}} " aria-label="Next Month">&#8594;</button>
            </div>
        </div>
        <button @click="resetDates()" class="px-2 py-1 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500" aria-label="Reset Dates">Reset</button>
    </div>

    <!-- Dual Calendars Display -->
    <div class="flex gap-8">
        <!-- Calendar Display Logic -->
        <div class="calendar grid grid-cols-7 gap-4 text-center">
            <template x-for="i in 7">
                <div class="font-semibold {{$dayClass}}" x-text="getDayName(i)"></div>
            </template>

            <template x-for="day in generateDays(currentYear, currentMonth)">
                <div class="py-2 cursor-pointer transition-colors duration-200 {{$dayClass}}" :class="dayClass(day.date)" @click="selectDate(day.date)" @mouseenter="hoverDate(day.date)" @mouseleave="leaveDate()" x-text="day.day" :aria-label="`Select ${day.date}`" tabindex="0" @keydown.enter="selectDate(day.date)"></div>
            </template>
        </div>
        <div class="calendar grid grid-cols-7 gap-4 text-center">
            <template x-for="i in 7">
                <div class="font-semibold {{$dayClass}}" x-text="getDayName(i)"></div>
            </template>
            <template x-for="day in generateDays(nextYear, currentMonth === 11 ? 0 : currentMonth + 1)">
                <div class="py-2 transition-colors duration-200 {{$dayClass}}" :class="dayClass(day.date)" @click="selectDate(day.date)" @mouseenter="hoverDate(day.date)" @mouseleave="leaveDate()" x-text="day.day" :aria-label="`Select ${day.date}`" tabindex="0" @keydown.enter="selectDate(day.date)"></div>
            </template>
        </div>
    </div>
    <p class="text-sm mt-4">Start Date: <span x-text="startDate || 'Not selected'"></span>, End Date: <span x-text="endDate || 'Not selected'"></span></p>
</div>

<script>
    Alpine.store('datePicker', {
        startDate: null,
        endDate: null,
    });
    function dateRangePicker() {
        return {
            startDate: null,
            endDate: null,
            hoverDate: null,
            currentYear: new Date().getFullYear(),
            currentMonth: new Date().getMonth(),
            currentDay : new Date().getDay(),
            firstDayOfWeek: 1,

            initComponent() {
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'ArrowLeft') {
                        this.changeMonth(-1);
                    } else if (e.key === 'ArrowRight') {
                        this.changeMonth(1);
                    }
                });
            },

            get currentMonthName() {
                return new Date(this.currentYear, this.currentMonth).toLocaleString('default', { month: 'long' });
            },

            get nextMonthName() {
                const nextMonth = this.currentMonth === 11 ? 0 : this.currentMonth + 1;
                return new Date(this.currentYear, nextMonth).toLocaleString('default', { month: 'long' });
            },

            get nextYear() {
                return this.currentMonth === 11 ? this.currentYear + 1 : this.currentYear;
            },

            get currentMonthDays() {
                return this.generateDays(this.currentYear, this.currentMonth);
            },

            get nextMonthDays() {
                const nextMonth = this.currentMonth === 11 ? 0 : this.currentMonth + 1;
                const nextYear = this.currentMonth === 11 ? this.currentYear + 1 : this.currentYear;
                return this.generateDays(nextYear, nextMonth);
            },
            getDayName(index){
                const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
                return days[(index + this.firstDayOfWeek - 1) % 7];
            },
            styleCurrent(day){
                return 'bg-red-400'
            },
            generateDays(year, month) {
                let date = new Date(year, month, 1); // Start from the first day of the month
                const days = [];

                // Calculate the offset to align the first day of the month with the calendar grid
                let dayOffset = date.getDay() - this.firstDayOfWeek;
                if (dayOffset < 0) dayOffset += 7; // Ensure positive offset

                // Add padding for days before the first day of the month, if necessary
                for (let i = 0; i < dayOffset; i++) {
                    days.push({ day: null, date: null }); // Push null days to align the start of the month
                }

                // Fill the days of the month
                while (date.getMonth() === month) {
                    const localDate = new Date(date.getTime() - (date.getTimezoneOffset() * 60000)).toISOString().split("T")[0];
                    days.push({
                        day: date.getDate(),
                        date: localDate, // Correctly reflects local date
                    });
                    date.setDate(date.getDate() + 1); // Move to the next day
                }

                return days;
            },


            dayClass(date) {
                if (date === null) {
                    return {}; // Or return {'no-class': true} if you prefer to explicitly mark it as having no applicable classes
                }
                const isSelected = date === this.startDate || date === this.endDate;
                const isInRange = this.startDate && this.endDate && date > this.startDate && date < this.endDate;
                const isHovering = this.hoverDate && ((date >= this.startDate && date <= this.hoverDate) || (date <= this.startDate && date >= this.hoverDate));
                const today = new Date().toISOString().split('T')[0];
                const isToday = date === today;
                const isPast = new Date(date) < new Date(today);
                return {
                    'cursor-pointer  bg-blue-500 text-white cousr': isSelected,
                    'cursor-pointer  bg-blue-200': isInRange || isHovering,
                    'cursor-pointer hover:bg-blue-100': !isSelected,
                    'cursor-pointer  bg-green-200': isToday,
                    'cursor-not-allowed text-gray-400': isPast,
                };
            },

            selectDate(date) {
                if (new Date(date) < new Date()) return;
                if (!this.startDate || (this.startDate && this.endDate)) {
                    this.startDate = date;
                    this.endDate = null;
                } else if (date < this.startDate) {
                    this.endDate = this.startDate;
                    this.startDate = date;
                } else {
                    this.endDate = date;
                }
                // Alpine.store('datePicker').startDate = this.startDate;
                // Alpine.store('datePicker').endDate = this.endDate;
                this.$dispatch('date-range-selected', { startDate: this.startDate, endDate: this.endDate });

                // this.$dispatch('date-selection-changed', { startDate: this.startDate, endDate: this.endDate });
            },

            hoverDate(date) {
                if (this.startDate && !this.endDate) {
                    this.hoverDate = date;
                }
            },

            leaveDate() {
                this.hoverDate = null;
            },

            changeMonth(direction) {
                this.currentMonth += direction;
                if (this.currentMonth < 0) {
                    this.currentYear -= 1;
                    this.currentMonth = 11;
                } else if (this.currentMonth > 11) {
                    this.currentYear += 1;
                    this.currentMonth = 0;
                }

                this.$nextTick(() => {
                    this.$refs.firstDayOfMonth.focus();
                });
            },

            resetDates() {
                this.startDate = null;
                this.endDate = null;
                this.hoverDate = null;
                this.$dispatch('dates-reset');
            },
        }
    }
</script>
