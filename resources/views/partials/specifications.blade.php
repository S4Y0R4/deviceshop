<ul>
   @foreach ($specifications as $specification)
      <li>
            <label for="specification_{{ $specification->id }}">{{ $specification->name }}</label>
            <input type="text" id="specification_{{ $specification->id }}" name="specifications[{{ $specification->id }}]" placeholder="{{ $specification->name }}" />
      </li>
   @endforeach
</ul>