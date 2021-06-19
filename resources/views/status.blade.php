
<x-app-layout>
        <body ng-app="apply" ng-controller="applycontroller">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Status') }}
        </h2>
    </x-slot>
<x-guest-layout>

<div>
    <table class="table-auto w-full">
        <thead>
        <tr style="text-align: center;">
            <!--
            <th class="px-4 py-2">ID</th>
        -->
            <th class="px-4 py-2">CREW ID</th>
            <th class="px-4 py-2">FROM</th>
            <th class="px-4 py-2">TO</th>
            <th class="px-4 py-2">NO.OF DAYS</th>
            <th class="px-4 py-2">STATUS</th>
            <th class="px-4 py-2">REMARKS</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($usersstatus as $userstatus)
            <tr style="text-align: center;" @if($loop->even)class="bg-grey"@endif >
                <!--
                <td class="border px-4 py-2">{{ $userstatus->id }}</td>
            -->
                <td class="border px-4 py-2">{{ $userstatus->crew_id }}</td>
                <td class="border px-4 py-2">{{ $userstatus->fromdate }}</td>
                <td class="border px-4 py-2">{{ $userstatus->todate }}</td>
                <td class="border px-4 py-2">{{ $userstatus->days }}</td>
                <td class="border px-4 py-2">{{ $userstatus->status }}</td>
                <td class="border px-4 py-2">{{ $userstatus->remarks }}</td>

            </tr>
        @endforeach
        </tbody>
    </table>

</div>

</x-guest-layout>

        </body>


</x-app-layout>