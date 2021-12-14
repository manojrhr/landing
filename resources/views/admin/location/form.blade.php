
                    @csrf
                      <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Hotel Name</label>
    
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="name" name="name" placeholder="Hotel Name" value="{{ old('name', $location->name) }}">
    
                            @error('name')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="slug" class="col-sm-2 control-label">Slug</label>
    
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{old('slug', $location->slug) }}">
    
                            @error('slug')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="address" class="col-sm-2 control-label">Address</label>
    
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{ old('address', $location->address) }}">
    
                            @error('address')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="city" class="col-sm-2 control-label">City</label>
    
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="city" name="city" placeholder="City" value="{{ old('city', $location->city) }}">
    
                            @error('city')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="zip" class="col-sm-2 control-label">Zip Code</label>
    
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="zip" name="zip" placeholder="Zip Code" value="{{ old('zip', $location->zip) }}">
    
                            @error('zip')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="lat" class="col-sm-2 control-label">Latitude</label>
    
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="lat" name="lat" placeholder="Latitude" value="{{ old('lat', $location->lat) }}">
    
                            @error('lat')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="long" class="col-sm-2 control-label">Longitude</label>
    
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="long" name="long" placeholder="Longitude" value="{{ old('long', $location->long) }}">
    
                            @error('long')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10 text-right">
                          <button type="submit" class="btn btn-danger">Update Sub Category</button>
                        </div>
                      </div>