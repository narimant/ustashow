@component('frontend.panel.master')

    <div style="margin: 20px;">
        <form action="{{ route('panel.payment') }}" method="post">
            {{ csrf_field() }}
            <select name="plan">
                <option value="1">عضویت ویژه 1 ماه 10000 تومان</option>
                <option value="3">عضویت ویژه 3 ماه 30000 تومان</option>
                <option value="12">عضویت ویژه 12 ماه 120000 تومان</option>
            </select>
            <button type="submit">افزایش اعتبار</button>
        </form>
    </div>

@endcomponent
