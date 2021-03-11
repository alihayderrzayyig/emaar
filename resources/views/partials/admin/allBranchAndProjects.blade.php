<div class="d-flex flex-row-reverse justify-content-around mb-5">
    <a href="{{ route('admin.branch.index') }}" class="btn-admin-header btn-admin-header-blue">
        <div class="card d-flex flex-row-reverse">
            <div class="icone m-0">
                <i class="far fa-file-alt m-0 p-0"></i>
            </div>
            <div class="text">
                <p class="m-0 p-0">
                    {{ isset($branchesCount) ? $branchesCount : '' }}
                    كل الفروع
                </p>
            </div>
        </div>
    </a>
    <a href="{{ route('admin.project.index') }}" class="btn-admin-header btn-admin-header-green">
        <div class="card d-flex flex-row-reverse">
            <div class="icone m-0">
                <i class="far fa-file-alt m-0 p-0"></i>
            </div>
            <div class="text">
                <p class="m-0 p-0">
                    {{ isset($projectsCount) ? $projectsCount : '' }}
                    كل المشاريع
                </p>
            </div>
        </div>
    </a>
</div>
