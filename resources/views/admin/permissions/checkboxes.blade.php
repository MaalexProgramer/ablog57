@foreach ($permissions as $id => $name)
  <div class="checkbox">
      <label>
          <input name="permissions[]" type="checkbox" value="{{ $name }}"
              {{ $user->permissions->contains($id)
                  || collect( old('permissions') )->contains($name)
                  ? 'checked':'' }}
          >{{ $name }}
      </label>
  </div>
@endforeach