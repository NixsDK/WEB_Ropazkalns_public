<div id="calendar" class="calendar"></div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const calendar = document.getElementById('calendar');
        const today = new Date();
        let year = today.getFullYear();
        let month = today.getMonth();

        function renderCalendar(y, m) {
            const firstDay = new Date(y, m, 1).getDay();
            const daysInMonth = new Date(y, m + 1, 0).getDate();

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
                const isToday = day === today.getDate() && m === today.getMonth() && y === today.getFullYear();
                html += `<div class="day${isToday ? ' today' : ''}">${day}</div>`;
            }

            html += '</div>';
            calendar.innerHTML = html;
        }

        window.changeMonth = function (offset) {
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
