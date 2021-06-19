
<x-app-layout>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
        <body ng-app="apply" ng-controller="applycontroller">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fill in the leave details to Apply for leave') }}
        </h2>
    </x-slot>
<x-guest-layout>
    <x-jet-authentication-card>

            
<!--
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>
-->
        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('store') }}">
            @csrf

            @include('flash-message')
<!--
            <div>
                <x-jet-label for="crew_id" value="{{ __('Crew_id') }}" />
                <x-jet-input id="crew_id" class="block mt-1 w-full" type="text" name="crew_id" :value="old('crew_id')" required autofocus autocomplete="crew_id" />
            </div>
-->
            <div>
                <x-jet-label for="crew_id" value="{{ __('Crew_id') }}" />
                <x-jet-input oninput="this.value = this.value.toUpperCase()" id="crew_id" class="block mt-1 w-full" type="text" name="crew_id" value="{{Auth::user()->crew_id}} "  autofocus autocomplete="crew_id" ng-readonly="true"  />
            </div>

            <div>
                <x-jet-label for="fromdate" value="{{ __('Fromdate') }}" />
                <x-jet-input ng-model="fdate" id="fromdate" class="block mt-1 w-full" type="date" min="{{ now()->toDateString('Y-m-d') }}"  name="fromdate" :value="old('fromdate')" required autofocus autocomplete="fromdate" />
            </div>
            <div>
                <x-jet-label for="todate" value="{{ __('Todate') }}" />
                <x-jet-input ng-model="tdate" id="todate" class="block mt-1 w-full" type="date" min="{{ now()->toDateString('Y-m-d') }}" name="todate" :value="old('todate')" required autofocus autocomplete="todate" />
            </div>
            <!--
            <div>
                <x-jet-label for="nodays" value="{{ __('No of Days') }}" />
                <x-jet-input id="nodays" class="block mt-1 w-full" type="text"  name="nodays"  required autofocus autocomplete="nodays" ng-readonly="true" ng-model="calcDiff"/>
            </div>
        -->
            <div>
                <x-jet-label for="reason" value="{{ __('Reason') }}" />
                <x-jet-input id="reason" class="block mt-1 w-full" type="text" name="reason" :value="old('reason')" required autofocus autocomplete="reason" />
            </div>

            

       

            <div class="flex items-center justify-end mt-4">
                

                <x-jet-button class="ml-4">
                    {{ __('Apply') }}
                </x-jet-button>
            </div>
        </form>

        <script>

  angular.module('apply', [])
    .controller('applycontroller', ['$scope', function($scope) {
    

});
            /*
$scope.fdate=new Date($scope.fdate);
$scope.tdate=new Date($scope.tdate);

$scope.nd=Math.abs($scope.tdate.getTime() - $scope.fdate.getTime());
//$scope.nodays=(($scope.fdate - $scope.tdate)  / 1000 / 60 / 60 / 24);

    }]);


    var app = angular.module('apply', []);
app.controller('applycontroller', function($scope) {






    */
</script>

  <script>
    angular.module('dateDiff', []);
    angular.module('dateDiff').value('moment', moment)
    
    
    angular.module('dateDiff').controller("index", index);
    index.$inject = ['moment'];
    function index(moment) {

      var vm = {
        startDate: undefined,
        endDate: undefined,
        result: {},
        getDiff: getDiff
      }

      init();
      return vm;

      function init() {}

      function getDiff() {
        var diff = dateDiff(vm.startDate, vm.endDate);
        
        if(diff !== undefined) {
          angular.extend(vm.result, diff)
        }
        else {
          alert('invalid start or end date');
        }
      }

      function dateDiff(startdate, enddate) {
        //define moments for the startdate and enddate
        var startdateMoment = moment(startdate);
        var enddateMoment = moment(enddate);

        if (startdateMoment.isValid() === true && enddateMoment.isValid() === true) {
          //getting the difference in years
          var years = enddateMoment.diff(startdateMoment, 'years');

          //moment returns the total months between the two dates, subtracting the years
          var months = enddateMoment.diff(startdateMoment, 'months') - (years * 12);

          //to calculate the days, first get the previous month and then subtract it
          startdateMoment.add(years, 'years').add(months, 'months');
          var days = enddateMoment.diff(startdateMoment, 'days')

          return {
            years: years,
            months: months,
            days: days
          };

        }
        else {
          return undefined;
        }

      }
    }
  </script>
  
        </body>
    </x-jet-authentication-card>
</x-guest-layout>



</x-app-layout>