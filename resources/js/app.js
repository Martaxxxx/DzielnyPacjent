import './bootstrap';
import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';
import Alpine from 'alpinejs';
import plLocale from '@fullcalendar/core/locales/pl';

import {
    createIcons,
    Printer,
    Save,
    Trash2,
    Edit,
    ArrowLeft,
    LogOut,
    Search,
    UserPlus,
    ClipboardCheck,
    Delete
} from 'lucide';

// Inicjalizacja Alpine.js
window.Alpine = Alpine;
Alpine.start();

// Inicjalizacja ikon Lucide
document.addEventListener('DOMContentLoaded', () => {
    createIcons({
        icons: {
            Printer,
            Save,
            Trash2,
            Edit,
            ArrowLeft,
            LogOut,
            Search,
            UserPlus,
            ClipboardCheck,
            Delete
        }
    });

    // Kalendarz
    const calendarEl = document.getElementById('calendar');

    if (calendarEl) {
        const calendar = new Calendar(calendarEl, {
            plugins: [dayGridPlugin, interactionPlugin],
            initialView: 'dayGridMonth',
            locale: 'pl',
            locales: [plLocale],
            height: 'auto',
            dayMaxEventRows: true,
            eventDisplay: 'block',
            displayEventTime: false, // ukrywamy domyślną godzinę

            events: '/api/wizyty-json',

            eventDidMount: function (info) {
                const time = info.event.start
                    ? new Date(info.event.start).toLocaleTimeString('pl-PL', {
                          hour: '2-digit',
                          minute: '2-digit'
                      })
                    : '';

                info.el.innerHTML = `
                    <div class="text-xs text-gray-500 mb-1">${time}</div>
                    <div class="text-sm text-black leading-tight break-words">${info.event.title}</div>
                `;

                info.el.style.backgroundColor = 'transparent';
                info.el.style.border = 'none';
                info.el.style.padding = '4px 6px';
                info.el.style.whiteSpace = 'normal';
                info.el.style.lineHeight = '1.3';
            }
        });

        calendar.render();
    }
});
