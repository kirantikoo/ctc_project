@extends('layouts.app')

@section('container')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">
            <i class="fa-solid fa-users me-2"></i>Members Dashboard
        </h2>
        <div class="d-flex gap-2">
            <button class="btn btn-outline-primary" onclick="toggleView()">
                <i class="fa-solid fa-id-card"></i>
                <span id="viewToggleText">Card View</span>
            </button>
            @if(Auth::check() && Auth::user()->is_admin)
                <a href="{{ route('members.create') }}" class="btn btn-primary">
                    <i class="fa-solid fa-user-plus me-1"></i> Add Member
                </a>
            @endif
        </div>
    </div>

    <!-- Search and Filter -->
    <div class="row mb-4 position-relative">
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
                <input type="text" class="form-control" id="searchInput" placeholder="Search by name or email..." oninput="searchMembers()">
            </div>
            <!-- Suggestions Dropdown -->
            <div id="suggestions" class="list-group position-absolute w-100 mt-1" style="z-index: 1000; display: none;"></div>
        </div>
        <div class="col-md-6">
            <select class="form-select" id="ageFilter" onchange="filterMembers()">
                <option value="">All Ages</option>
                <option value="18-30">18-30</option>
                <option value="31-50">31-50</option>
                <option value="51+">51+</option>
            </select>
        </div>
    </div>

    <!-- Table View -->
    <div id="tableView" class="table-responsive">
        <table class="table table-hover">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>First</th>
                    <th>Last</th>
                    <th>Email</th>
                    <th>Age</th>
                    @if(Auth::check() && Auth::user()->is_admin)
                        <th>Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody id="membersTableBody">
                @foreach($members as $member)
                    <tr class="member" 
                        data-name="{{ strtolower($member->first_name . ' ' . $member->last_name) }}" 
                        data-email="{{ strtolower($member->email) }}"
                        data-age="{{ $member->age }}">
                        <td>{{ $member->id }}</td>
                        <td>{{ $member->first_name }}</td>
                        <td>{{ $member->last_name }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->age }}</td>
                        @if(Auth::check() && Auth::user()->is_admin)
                            <td>
                                <a href="{{ route('members.edit', $member->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </a>
                                <form action="{{ route('members.destroy', $member->id) }}" method="POST" class="d-inline">
                                    @csrf 
                                    @method('DELETE')
                                    <a href="{{ route('members.destroyConfirm', $member) }}" class="btn btn-danger">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </a>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Pagination Links -->
        <div class="d-flex justify-content-center mt-3">
            {{ $members->links('pagination::bootstrap-5') }}
        </div>
    </div>

    <!-- Card View -->
    <div id="cardView" class="row d-none">
        @foreach($members as $member)
            <div class="col-md-4 mb-3 member" 
                data-name="{{ strtolower($member->first_name . ' ' . $member->last_name) }}" 
                data-email="{{ strtolower($member->email) }}"
                data-age="{{ $member->age }}">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $member->first_name }} {{ $member->last_name }}</h5>
                        <p class="card-text"><strong>Email:</strong> {{ $member->email }}</p>
                        <p class="card-text"><strong>Age:</strong> {{ $member->age }}</p>
                        @if(Auth::check() && Auth::user()->is_admin)
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('members.edit', $member->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </a>
                                <form action="{{ route('members.destroy', $member->id) }}" method="POST">
                                    @csrf 
                                    @method('DELETE')
                                    <a href="{{ route('members.destroyConfirm', $member) }}" class="btn btn-danger">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </a>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
        <!-- Pagination Links -->
        <div class="d-flex justify-content-center mt-3">
            {{ $members->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>

<!-- Scripts -->
<script>
function toggleView() {
    const table = document.getElementById("tableView");
    const card = document.getElementById("cardView");
    const text = document.getElementById("viewToggleText");

    if (card.classList.contains("d-none")) {
        card.classList.remove("d-none");
        table.classList.add("d-none");
        text.textContent = "Table View";
    } else {
        card.classList.add("d-none");
        table.classList.remove("d-none");
        text.textContent = "Card View";
    }
}

function filterMembers() {
    const filter = document.getElementById("ageFilter").value;
    const members = document.querySelectorAll(".member");

    members.forEach(member => {
        const age = parseInt(member.dataset.age);
        let show = true;

        if (filter === "18-30") show = age >= 18 && age <= 30;
        else if (filter === "31-50") show = age >= 31 && age <= 50;
        else if (filter === "51+") show = age >= 51;

        member.style.display = show ? "" : "none";
    });
}

function searchMembers() {
    const input = document.getElementById("searchInput");
    const query = input.value.toLowerCase();
    const members = document.querySelectorAll(".member");
    const suggestionsBox = document.getElementById("suggestions");

    suggestionsBox.innerHTML = '';
    suggestionsBox.style.display = query ? "block" : "none";

    let matches = [];

    members.forEach(member => {
        const name = member.dataset.name;
        const email = member.dataset.email;
        const match = name.includes(query) || email.includes(query);
        member.style.display = match ? "" : "none";

        if (match && email.includes(query) && !matches.includes(email)) {
            matches.push(email);
        }
    });

    matches.slice(0, 5).forEach(email => {
        const item = document.createElement('button');
        item.className = 'list-group-item list-group-item-action';
        item.textContent = email;
        item.onclick = () => {
            input.value = email;
            suggestionsBox.style.display = 'none';
            searchMembers(); // trigger again with selected value
        };
        suggestionsBox.appendChild(item);
    });
}
</script>
@endsection

