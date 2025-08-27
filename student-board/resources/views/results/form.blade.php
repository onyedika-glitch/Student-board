<form action="{{ route('results.store') }}" method="POST">
    @csrf
    
    <div class="form-group">
        <label for="course_id">Course</label>
        <select name="course_id" class="form-control" required>
            <option value="">-- Select Course --</option>
            @foreach($courses as $course)
                <option value="{{ $course->id }}">{{ $course->code }} - {{ $course->title }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="score">Score</label>
        <input type="number" name="score" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="grade">Grade</label>
        <input type="text" name="grade" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>
</div>