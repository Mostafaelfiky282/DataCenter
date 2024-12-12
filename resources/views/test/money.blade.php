@extends('front.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/delete.css') }}">
<div class="form-container">
    <h1>بيان بالمصروفات الطلاب المصريين و الوافدين</h1>
    <form method="" action="">
      <div class="form-group">
        <label for="college"> الكلية</label>
        <select name="college" id="college">
          <option value=""> الكلية</option>
          <option value=""></option>
          <option value=""></option>
        </select>
      </div>
    
    <div class="form-group">
      <label for="nationality"> الجنسية</label>
      <select name="nationality" id="nationality">
        <option value=""> الجنسية</option>
        <option value="مصري">مصري</option>
        <option value="غير مصري">غير مصري</option>
      </select>
    </div>
    
      <div class="form-group">
        <label for="program"> البرنامج</label>
        <select name="program" id="program">
          <option value="عام">برنامج عام</option>
          <option value=" ساعات معتمده">برنامج ساعات معتمده</option>
        </select>
      </div>
  
      <div class="form-group">
        <label for="level"> اعدادي</label>
        <input type="number">
      </div>
      <div class="form-group">
        <label for="level"> الفرقة الاولي</label>
        <input type="number">
      </div>
      <div class="form-group">
        <label for="level"> الفرقة الثانية</label>
        <input type="number">
      </div>
      <div class="form-group">
        <label for="level"> الفرقة الثالثة</label>
        <input type="number">
      </div>
      <div class="form-group">
        <label for="level"> الفرقة الرابعة</label>
        <input type="number">
      </div>
      <div class="form-group">
        <label for="level"> الفرقة الخامسة</label>
        <input type="number">
      </div>
      <div class="form-group">
        <label for="level"> الفرقة السادسة</label>
        <input type="number">
      </div>
      
      <button type="submit" name="save">حفظ</button>
    </form>
  </div>

@endsection