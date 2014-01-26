from django.contrib import admin
from models import *


# Register your models here.
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

admin.site.register(Build)
admin.site.register(Domain, DomainAdmin)
admin.site.register(Repository)
admin.site.register(Recipe)
admin.site.register(RecipeType)
admin.site.register(Server)
admin.site.register(Workspace)