from django.contrib import admin
from models import *


# Register your models here.
class BuildAdmin(admin.ModelAdmin):
    fieldsets = [
        ('Information', {
            'fields': ['status', 'name']
        })
    ]
    radio_fields = {'status': admin.HORIZONTAL}

    list_display = ('name', 'is_active')
    list_filter = ['status']
    search_fields = ['name']


class DomainAdmin(admin.ModelAdmin):
    fieldsets = [
        ('Information', {
            'fields': ['status', 'type', 'name']
        })
    ]
    radio_fields = {
        'status': admin.HORIZONTAL,
        'type': admin.HORIZONTAL
    }

    list_display = ('name', 'type', 'is_active')
    list_filter = ['type', 'status']
    search_fields = ['name']


class RepositoryAdmin(admin.ModelAdmin):
    fieldsets = [
        ('Information', {
            'fields': ['status', 'name']
        }),
        ('Parameters', {
            'fields': ['slug', 'url']
        })
    ]
    radio_fields = {'status': admin.HORIZONTAL}

    list_display = ('name', 'slug', 'url', 'is_active')
    list_filter = ['status', 'slug']
    search_fields = ['name', 'slug']


class ServerAdmin(admin.ModelAdmin):
    fieldsets = [
        ('Information', {
            'fields': ['status', 'name']
        }),
        ('Parameters', {
            'fields': ['hostname', 'username', 'password', 'ssh_key']
        })
    ]
    radio_fields = {'status': admin.HORIZONTAL}

    list_display = ('name', 'hostname', 'username', 'is_active')
    list_filter = ['status', 'hostname', 'username']
    search_fields = ['name', 'hostname', 'username']


class WorkspaceAdmin(admin.ModelAdmin):
    fieldsets = [
        ('Information', {
            'fields': ['status', 'name']
        }),
        ('Parameters', {
            'fields': ['path', 'repository', 'domain', 'server']
        })
    ]
    radio_fields = {'status': admin.HORIZONTAL}

    list_display = ('name', 'repository', 'domain', 'branch', 'path', 'is_active')
    list_filter = ['status', 'repository', 'domain', 'branch']
    search_fields = ['name', 'repository', 'domain', 'branch']

admin.site.register(Build)
admin.site.register(Domain, DomainAdmin)
admin.site.register(Repository, RepositoryAdmin)
admin.site.register(Recipe)
admin.site.register(RecipeType)
admin.site.register(Server, ServerAdmin)
admin.site.register(Workspace, WorkspaceAdmin)