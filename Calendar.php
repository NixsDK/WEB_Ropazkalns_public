<!-- calendar container -->
<div id="calendar" class="calendar"></div>
<div id="popup"></div>

<!-- calendar logic -->
<script>

    function showPopup(content) {
        const popup = document.getElementById('popup');

        popup.innerHTML = `
            <div style="text-align: right;">
                <button id="closePopup" style="font-size: 18px; background: none; border: none; cursor: pointer;">&times;</button>
            </div>
            ${content}
        `;

        popup.style.display = 'block';

        document.getElementById('closePopup').addEventListener('click', function () {
            popup.style.display = 'none';
        });
    }
    

    document.addEventListener('DOMContentLoaded', function () {
        const calendar = document.getElementById('calendar');

        const today = new Date();
        let year = today.getFullYear();
        let month = today.getMonth();

        let reservedDates = [];

        fetch('getReservedDates.php')
            .then(response => response.json())
            .then(data => {
                reservedDates = data;
                renderCalendar(year, month);
        });

        function renderCalendar(y, m) {
            const firstDay = new Date(y, m, 1).getDay();
            const daysInMonth = new Date(y, m + 1, 0).getDate();
            const monthName = new Date(y, m).toLocaleString('default', { month: 'long' });

            // header with dropdowns
            let html = `
            <div class="calendar-header">
                <button class="nav-btn" onclick="changeMonth(-1)">&#10094;</button>
                <select id="month-select" class="calendar-select">
                    ${Array.from({ length: 12 }, (_, i) =>
                `<option value="${i}" ${i === m ? 'selected' : ''}>${new Date(0, i).toLocaleString('default', { month: 'long' })}</option>`
            ).join('')}
                </select>
                <select id="year-select" class="calendar-select">
                    ${Array.from({ length: 9 }, (_, i) => {
                const yVal = today.getFullYear() - 4 + i;
                return `<option value="${yVal}" ${yVal === y ? 'selected' : ''}>${yVal}</option>`;
            }).join('')}
                </select>
                <button class="nav-btn" onclick="changeMonth(1)">&#10095;</button>
            </div>
            <div class="calendar-grid">
                <div>Sun</div><div>Mon</div><div>Tue</div><div>Wed</div><div>Thu</div><div>Fri</div><div>Sat</div>
        `;

            for (let i = 0; i < firstDay; i++) html += '<div class="empty"></div>';

            for (let day = 1; day <= daysInMonth; day++) {
                const dateStr = `${y}-${String(m + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                const isReserved = reservedDates.includes(dateStr);
                const isToday = day === today.getDate() && m === today.getMonth() && y === today.getFullYear();

                html += `<div class="calendar-day${isToday ? ' today' : ''}${isReserved ? ' reserved' : ''}" data-date="${dateStr}">${day}</div>`;
            }

            html += '</div>';
            calendar.innerHTML = html;

            document.querySelectorAll('.calendar-day').forEach(day => {
                day.addEventListener('click', function() {
                    const selectedDate = this.getAttribute('data-date');

                    fetch('BookingInformation.php?date=' + selectedDate)
                        .then(response => response.json())
                        .then(data => {
                            let content = `<h3>Bookings for ${selectedDate}</h3>`;
                            if (data.length === 0) {
                                content += "<p>No bookings</p>";
                            } else {
                                data.forEach(booking => {
                                    content += `<p>
                                            <strong>${booking.item_name}</strong><br>
                                            ${booking.start_date} → ${booking.end_date}<br>
                                        </p><hr>`;
                                });
                            }

                            showPopup(content);
                        });
                });
            });
            
        }

        // month nav buttons
        window.changeMonth = function(offset) {
            month += offset;
            if (month > 11) {
                month = 0;
                year++;
            } else if (month < 0) {
                month = 11;
                year--;
            }
            renderCalendar(year, month);
        };

        // dropdown listeners
        document.addEventListener('change', function (e) {
            if (e.target.id === 'month-select') {
                month = parseInt(e.target.value);
                renderCalendar(year, month);
            }
            if (e.target.id === 'year-select') {
                year = parseInt(e.target.value);
                renderCalendar(year, month);
            }
        });

        renderCalendar(year, month);
    });
</script>
