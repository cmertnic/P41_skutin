<div class="flex justify-center items-center bg-gray-100">
    <div class="bg-white shadow-md rounded-lg p-4 max-w-md w-full mb-2">
        <h2 class="font-bold text-xl mb-2">Заявка от
            {{ $order->created_at ? $order->created_at->format('d.m.Y') : 'Неизвестное время' }}
        </h2>
        <p><strong>Клиент:</strong> {{ $order->user->login ?? 'Неизвестный клиент' }}</p>
        <p><strong>Время:</strong> {{ $order->time }}</p>
        <p><strong>дата</strong>
            {{$order->date}}
        </p>
        <p><strong>тип</strong>
            {{$order->type}}
        </p>
        <p><strong>оплата</strong>
            {{$order->payment}}
        </p>
        <p><strong>адрес</strong>
            {{$order->adress}}
        </p>
        <select id="statuses" name="statuses" class="block mt-4 w-full" required
            onchange="updateStatus(this, '{{ $order->id }}');">
            <option value="в процессе">в процессе</option>
            <option value="завершена">завершена</option>
            <option value="отменена">отменена</option>
        </select>
    </div>
</div>