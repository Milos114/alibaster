@php use App\Models\Rate; @endphp
<div>
    <h2>Exchange office</h2>
    <p>"Money often costs too much." --Ralph Waldo Emerson</p>
    <form>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="amount">Amount to purchase</label>
                <input wire:model="amount" type="number" class="form-control" id="amount" min="1">
                @if($errors->has('amount'))
                    <span class="text-danger">{{ $errors->first('amount') }}</span>
                @endif
            </div>
            <div class="form-group col-md-3">
                <label for="currency">Purchase currency</label>

                <select wire:model="currency" id="currency" class="form-control">
                    <option selected disabled value="">Choose...</option>
                    @foreach($currencies as $id => $banknote)
                        <option value="{{$id}}">{{$banknote}}</option>
                    @endforeach
                </select>
                @if($errors->has('currency'))
                    <span class="text-danger">{{ $errors->first('currency') }}</span>
                @endif
            </div>
            @if ($showResult && !$errors->count())
                <div class="form-group col-md-6">
                    <label for="amount">USD (calculated
                        surcharge{{(int)$currency === Rate::EURO ? ' and discount' : ''}})</label>
                    <div class="form-control" readonly>
                        {{round($result, 2)}}
                    </div>
                </div>
            @endif
        </div>
        <button wire:click.prevent="purchase" type="submit"
                class="btn btn-primary" {{$errors->count() || !$amount ? 'disabled' : ''}}>Purchase
        </button>
    </form>
    <script>
        window.addEventListener('purchase:success', function (e) {
            Swal.fire(e.detail);
        });
    </script>
</div>

